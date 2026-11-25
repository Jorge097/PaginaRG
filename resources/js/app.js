/**
 * RG Fertilizantes Foliares: interacción.
 * Todo es mejora progresiva: sin JS, el menú (popover), las fichas (anclas a
 * #ficha-*) y el formulario siguen funcionando.
 * Solo se animan transform, opacity y clip-path.
 */
import Lenis from 'lenis';
import { animate, stagger } from 'motion';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
const SPRING = { type: 'spring', stiffness: 260, damping: 28, mass: 0.9 };

const $ = (sel, root = document) => root.querySelector(sel);
const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

/* ---------- Scroll suave (Lenis) ---------- */
let lenis = null;

function headerOffset() {
    return -(($('[data-header]')?.offsetHeight ?? 0) + 16);
}

if (!reduceMotion.matches) {
    lenis = new Lenis({
        autoRaf: true,
        lerp: 0.12,
        anchors: { offset: headerOffset() },
    });
}

function scrollToId(id) {
    const target = document.getElementById(id);
    if (!target) return;
    if (lenis) {
        lenis.scrollTo(target, { offset: headerOffset() });
    } else {
        target.scrollIntoView({ behavior: 'auto', block: 'start' });
    }
}

/* ---------- Menú móvil (popover nativo) ---------- */
const menu = $('[data-menu]');
if (menu) {
    menu.addEventListener('click', (e) => {
        if (e.target.closest('a') && menu.matches(':popover-open')) menu.hidePopover();
    });
    menu.addEventListener('toggle', (e) => {
        if (!lenis) return;
        e.newState === 'open' ? lenis.stop() : lenis.start();
    });
}

/* ---------- Fichas de producto: la placa viaja a la ficha ---------- */
const canMorph = () => typeof document.startViewTransition === 'function' && !reduceMotion.matches;

function morph(from, to, update) {
    if (!canMorph() || !from || !to) {
        update();
        return Promise.resolve();
    }
    from.style.viewTransitionName = 'placa';
    document.documentElement.classList.add('vt-active');
    const vt = document.startViewTransition(() => {
        from.style.viewTransitionName = '';
        update();
        to.style.viewTransitionName = 'placa';
    });
    return vt.finished.finally(() => {
        to.style.viewTransitionName = '';
        document.documentElement.classList.remove('vt-active');
    });
}

let lastTrigger = null;

function openSheet(trigger) {
    const dialog = document.getElementById(trigger.getAttribute('aria-controls'));
    if (!(dialog instanceof HTMLDialogElement) || dialog.open) return;
    lastTrigger = trigger;
    lenis?.stop();
    morph($('[data-vt]', trigger), $('[data-vt]', dialog), () => dialog.showModal());
}

function closeSheet(dialog, { animated = true } = {}) {
    if (!dialog.open) return Promise.resolve();
    const source = lastTrigger ? $('[data-vt]', lastTrigger) : null;
    const done = () => dialog.close();
    return animated ? morph($('[data-vt]', dialog), source, done) : (done(), Promise.resolve());
}

document.addEventListener('click', (e) => {
    const trigger = e.target.closest('[data-open-product]');
    if (trigger) {
        openSheet(trigger);
    }
});

$$('dialog.sheet').forEach((dialog) => {
    // Botón cerrar: interceptamos el form method=dialog para animar el regreso.
    $('.sheet__close', dialog)?.addEventListener('click', (e) => {
        e.preventDefault();
        closeSheet(dialog);
    });
    // Clic en el fondo
    dialog.addEventListener('click', (e) => {
        if (e.target === dialog) closeSheet(dialog);
    });
    // Escape
    dialog.addEventListener('cancel', (e) => {
        e.preventDefault();
        closeSheet(dialog);
    });
    dialog.addEventListener('close', () => {
        lenis?.start();
        lastTrigger?.focus({ preventScroll: true });
    });

    // "Cotizar X": prellena el comentario y lleva al formulario.
    $('[data-cotizar]', dialog)?.addEventListener('click', async (e) => {
        e.preventDefault();
        const nombre = e.currentTarget.dataset.cotizar ?? '';
        const comment = document.getElementById('Comment');
        if (comment && comment.value.trim() === '') {
            comment.value = `Me interesa cotizar ${nombre}.`;
        }
        lastTrigger = null; // no regresar el foco a la tarjeta
        await closeSheet(dialog, { animated: false });
        lenis?.start(); // el evento 'close' llega en otra tarea; Lenis debe estar activo ya
        scrollToId('cotizar');
        document.getElementById('Name')?.focus({ preventScroll: true });
    });
});

/* ---------- Filtros del catálogo (FLIP con resorte) ---------- */
const filters = $('[data-filters]');
const grid = $('[data-products]');

if (filters && grid) {
    const items = $$('.label', grid);
    const count = $('[data-filter-count]', filters);
    const empty = $('[data-products-empty]');
    const cultivoChips = $$('[data-filter-cultivo]', filters);
    const tipoChips = $$('[data-filter-tipo]', filters);
    const cultivosValidos = new Set(cultivoChips.map((c) => c.dataset.filterCultivo));
    const state = { cultivo: '', tipo: '' };

    const matches = (li) =>
        (state.tipo === '' || li.dataset.tipo === state.tipo) &&
        (state.cultivo === '' || (li.dataset.cultivos ?? '').split('|').includes(state.cultivo));

    function press(chips, key, value) {
        chips.forEach((c) => c.setAttribute('aria-pressed', String(c.dataset[key] === value)));
    }

    function apply({ animated = true } = {}) {
        press(cultivoChips, 'filterCultivo', state.cultivo);
        press(tipoChips, 'filterTipo', state.tipo);

        // First
        const before = new Map(items.filter((li) => !li.hidden).map((li) => [li, li.getBoundingClientRect()]));

        let visible = 0;
        items.forEach((li) => {
            li.hidden = !matches(li);
            if (!li.hidden) visible += 1;
        });

        count.textContent = visible === 1 ? '1 producto' : `${visible} productos`;
        empty.hidden = visible !== 0;

        if (!animated) return;

        // Last, Invert, Play
        items.forEach((li) => {
            if (li.hidden) return;
            const first = before.get(li);
            if (reduceMotion.matches) {
                if (!first) animate(li, { opacity: [0, 1] }, { duration: 0.2 });
                return;
            }
            if (first) {
                const last = li.getBoundingClientRect();
                const dx = first.left - last.left;
                const dy = first.top - last.top;
                if (dx || dy) animate(li, { x: [dx, 0], y: [dy, 0] }, SPRING);
            } else {
                animate(li, { opacity: [0, 1], scale: [0.92, 1] }, SPRING);
            }
        });
    }

    function syncUrl() {
        const url = new URL(window.location.href);
        state.cultivo ? url.searchParams.set('cultivo', state.cultivo) : url.searchParams.delete('cultivo');
        history.replaceState(null, '', url);
    }

    filters.addEventListener('click', (e) => {
        const chip = e.target.closest('.chip');
        if (!chip) return;
        if ('filterCultivo' in chip.dataset) {
            state.cultivo = chip.dataset.filterCultivo;
            syncUrl();
        } else if ('filterTipo' in chip.dataset) {
            state.tipo = chip.dataset.filterTipo;
        }
        apply();
    });

    // ?cultivo= desde la portada: solo se aceptan valores de la lista blanca.
    const pedido = new URLSearchParams(window.location.search).get('cultivo') ?? '';
    if (pedido && cultivosValidos.has(pedido)) {
        state.cultivo = pedido;
        apply({ animated: false });
    }
}

/* ---------- El año en la huerta: pestañas con el sol que recorre el riel ---------- */
const season = $('[data-season]');
if (season) {
    const track = $('[data-season-tabs]', season);
    const sun = $('[data-season-sun]', season);
    const tabs = $$('[role="tab"]', track);
    const panels = $$('[data-season-panel]', season);
    let current = 0;

    track.hidden = false;
    season.classList.add('is-enhanced');

    // Posición de la marca de la etapa (borde izquierdo de la pestaña), relativa al riel.
    const sunX = (tab) => tab.offsetLeft - sun.parentElement.offsetLeft;

    function select(index, { focus = false, animated = true } = {}) {
        const prev = current;
        current = index;
        tabs.forEach((t, i) => {
            const on = i === index;
            t.setAttribute('aria-selected', String(on));
            t.tabIndex = on ? 0 : -1;
        });
        // Los paneles inactivos ocupan la misma celda (alto estable) pero quedan invisibles e inertes.
        panels.forEach((p, i) => {
            const off = i !== index;
            p.toggleAttribute('data-inactive', off);
            p.inert = off;
        });

        const tab = tabs[index];
        if (focus) tab.focus({ preventScroll: true });
        if (animated) {
            // Solo desplaza el riel (scroll horizontal en móvil), nunca la página.
            const left = tab.offsetLeft - track.clientWidth / 2 + tab.offsetWidth / 2;
            track.scrollTo({ left, behavior: reduceMotion.matches ? 'auto' : 'smooth' });
        }

        const x = sunX(tab);
        if (!animated || reduceMotion.matches) {
            animate(sun, { x }, { duration: 0 });
        } else {
            animate(sun, { x }, SPRING);
        }

        if (animated && prev !== index) {
            const dir = index > prev ? 1 : -1;
            const panel = panels[index];
            if (reduceMotion.matches) {
                animate(panel, { opacity: [0, 1] }, { duration: 0.2 });
            } else {
                animate(panel, { opacity: [0, 1], x: [24 * dir, 0] }, SPRING);
                animate(
                    $$('.season__products li', panel),
                    { opacity: [0, 1], y: [12, 0] },
                    { ...SPRING, delay: stagger(0.06, { startDelay: 0.05 }) },
                );
            }
        }
    }

    track.addEventListener('click', (e) => {
        const tab = e.target.closest('[role="tab"]');
        if (tab) select(tabs.indexOf(tab));
    });

    track.addEventListener('keydown', (e) => {
        const steps = { ArrowRight: 1, ArrowLeft: -1 };
        let next = null;
        if (e.key in steps) next = (current + steps[e.key] + tabs.length) % tabs.length;
        else if (e.key === 'Home') next = 0;
        else if (e.key === 'End') next = tabs.length - 1;
        if (next === null) return;
        e.preventDefault();
        select(next, { focus: true });
    });

    select(0, { animated: false });
    // El riel cambia de ancho con la ventana: el sol se recoloca sin animar.
    new ResizeObserver(() => animate(sun, { x: sunX(tabs[current]) }, { duration: 0 })).observe(track);
}

/* ---------- Avisos del formulario ---------- */
const notice = $('[data-focus-on-load]');
if (notice) {
    notice.setAttribute('tabindex', '-1');
    // Después de 'load': el navegador ya procesó el #cotizar de la URL y no nos quita el foco.
    const focusNotice = () =>
        setTimeout(() => {
            scrollToId('cotizar');
            notice.focus({ preventScroll: true });
        }, 0);
    document.readyState === 'complete' ? focusNotice() : window.addEventListener('load', focusNotice, { once: true });
}
