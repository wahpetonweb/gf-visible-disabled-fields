document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.gform_wrapper').forEach(form => {
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                /* check if field has conditional logic */
                if (
                    mutation.type === 'attributes' &&
                    mutation.attributeName === 'data-conditional-logic'
                ) {
                    const field = mutation.target;
                    if (field.classList.contains('gf-visible-disabled')) {
                        const shouldBeHidden = field.getAttribute('data-conditional-logic') === 'hidden';
                        /* always keep it visible */
                        field.style.display = '';
                        /* toggle inputs based on logic */
                        field.querySelectorAll('input, select, textarea, button').forEach(el => {
                            el.disabled = shouldBeHidden;     
                            if (shouldBeHidden) {
                                let note = field.querySelector('.gf-disabled-note');
                                if (!note) {
                                    note = document.createElement('div');
                                    note.className = 'gf-disabled-note';
                                    note.id = 'gf-disabled-note-' + field.id;
                                    note.textContent = 'This field is currently disabled based on previous selections.';
                                    field.appendChild(note);
                                }
                                el.setAttribute('aria-describedby', note.id);
                            } else {
                                el.removeAttribute('aria-describedby');
                                /* remove note */
                                const note = field.querySelector('.gf-disabled-note');
                                if (note) {
                                    note.remove();
                                }
                            }
                        });
                    }
                }
            });
        });
        form.querySelectorAll('.gfield.gf-visible-disabled').forEach(field => {
            observer.observe(field, {
                attributes: true,
                attributeFilter: ['data-conditional-logic', 'style'],
            });
        });
    });
});