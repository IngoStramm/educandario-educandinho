(() => {
    'use strict';
    function toggleFilterList(e) {
        e.preventDefault();
        const btn = e.target;
        const container = btn.closest('.edu-select');
        container.classList.toggle('opened');
    }
    function selectOption(e) {
        const form = e.target.closest('.edu-post-date-filter');
        const option = e.target;
        const container = option.closest('.edu-select');
        const clearBtn = container.querySelector('.edu-clear-btn');
        const btnText = container.querySelector('.edu-select-btn-text');
        const originalText = btnText.dataset.orginalText;
        if (!originalText) {
            btnText.dataset.orginalText = btnText.textContent.trim();
            clearBtn.style.display = 'block';
        }
        const newOptionText = option.textContent.trim();
        const newOptionValue = option.dataset.value;
        const input = container.querySelector('input');
        input.value = newOptionValue ? newOptionValue : '';
        input.dispatchEvent(new Event('input', { bubbles: true }));
        container.classList.remove('opened');
        btnText.textContent = newOptionText;
        clearValidation(form);
    }
    function clearOption(e) {
        const form = e.target.closest('.edu-post-date-filter');
        const container = e.target.closest('.edu-select');
        const clearBtn = container.querySelector('.edu-clear-btn');
        const btnText = container.querySelector('.edu-select-btn-text');
        const originalText = btnText.dataset.orginalText;
        const input = container.querySelector('input');
        input.value = '';
        input.dispatchEvent(new Event('input', { bubbles: true }));
        btnText.textContent = originalText;
        delete btnText.dataset.orginalText;
        clearBtn.style.display = 'none';
        container.classList.remove('opened');
        clearValidation(form);
    }
    function validateFilter(form) {
        let valid = true;
        const eduPostMonthInput = form.querySelector('[name="edu-post-month"]');
        const eduPostYearInput = form.querySelector('[name="edu-post-year"]');
        const monthContainer = eduPostMonthInput.closest('.edu-select');
        const yearContainer = eduPostYearInput.closest('.edu-select');
        clearValidation(form);
        if (!eduPostMonthInput.value) {
            monthContainer.classList.add('invalid');
            valid = false;
        }
        if (!eduPostYearInput.value) {
            yearContainer.classList.add('invalid');
            valid = false;
        }
        return valid;
    }
    function clearValidation(form) {
        const eduPostMonthInput = form.querySelector('[name="edu-post-month"]');
        const eduPostYearInput = form.querySelector('[name="edu-post-year"]');
        const monthContainer = eduPostMonthInput.closest('.edu-select');
        const yearContainer = eduPostYearInput.closest('.edu-select');
        monthContainer.classList.remove('invalid');
        yearContainer.classList.remove('invalid');
    }
    function submitFilter(e) {
        e.preventDefault();
        e.stopPropagation();
        const form = e.target.closest('.edu-post-date-filter');
        const valid = validateFilter(form);
        const eduPostMonthInput = e.target.querySelector('#edu-post-month');
        const eduPostYearInput = e.target.querySelector('#edu-post-year');
        const newUrl = `${window.location.protocol}//${window.location.host}/${eduPostYearInput.value}/${eduPostMonthInput.value}`;
        if (valid) {
            window.location = newUrl;
        }
    }
    function selectedOption(form) {
        const path = window.location.pathname;
        const pathSegments = path.split('/');
        const eduSelectDivs = form.querySelectorAll('.edu-select');
        eduSelectDivs.forEach(container => {
            const eduSelectBtnText = container.querySelector('.edu-select-btn-text');
            const eduSelectListOptions = container.querySelectorAll('li');
            const selectInput = container.querySelector('[type="hidden"]');
            const clearBtn = container.querySelector('.edu-clear-btn');
            eduSelectListOptions.forEach(option => {
                const optionValue = option.dataset.value;
                if (pathSegments.includes(optionValue)) {
                    option.click();
                }
            });
        });

    }
    function dataFilterActions() {
        const postDateFilters = document.querySelectorAll('.edu-post-date-filter');
        postDateFilters.forEach(form => {
            const selectBtns = form.querySelectorAll('.edu-select-btn');
            selectBtns.forEach(btn => {
                btn.addEventListener('click', toggleFilterList);
            });
            const clearBtns = form.querySelectorAll('.edu-clear-btn');
            clearBtns.forEach(btn => {
                btn.addEventListener('click', clearOption);
            });
            const listOptions = form.querySelectorAll('.edu-select-list li');
            listOptions.forEach(option => {
                option.addEventListener('click', selectOption);
            });
            form.addEventListener('submit', submitFilter);
            selectedOption(form);
        });
    }
    window.addEventListener('load', function () {
        dataFilterActions();
    });
})();