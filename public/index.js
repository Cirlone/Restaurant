console.log('index.js loaded');

// Wait for DOM to be fully ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');
    console.log('Custom dropdowns found:', document.querySelectorAll('.custom-dropdown').length);
    console.log('Custom dropdown roles found:', document.querySelectorAll('.custom-dropdown-roles').length);

    // --- Hamburger Menu ---
    const hamburger = document.querySelector('.hamburger');
    const navItems = document.querySelector('.nav-items');
    const close = document.querySelector('.close');
    const closeNav = document.querySelector('.nav') || document.querySelector('.nav-dashboard');

    if (hamburger && navItems && close) {
        hamburger.addEventListener('click', function() {
            if (navItems) navItems.classList.toggle('active');
            if (hamburger) hamburger.classList.toggle('active');
            if (close) close.classList.add('active');
        });
    }

    if (close && navItems && hamburger) {
        close.addEventListener('click', function() {
            if (navItems) navItems.classList.remove('active');
            if (hamburger) hamburger.classList.remove('active');
            if (close) close.classList.remove('active');
        });
    }

    // Fix: Check if closeNav exists before adding event listener
    if (closeNav) {
        document.body.addEventListener('click', function(e) {
            if (!closeNav.contains(e.target)) {
                if (navItems) navItems.classList.remove('active');
                if (hamburger) hamburger.classList.remove('active');
                if (close) close.classList.remove('active');
            }
        });
    }

    // --- Logout Dropdown ---
    const userLog = document.querySelector('.user-log');
    const dropdown = document.querySelector('.dropdown-options');

    if (userLog && dropdown) {
        userLog.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && !userLog.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    }

    // --- Profile Modal Close on Outside Click ---
    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('delete-account-form')) {
            document.getElementById('delete-account-form').style.display = 'none';
        }
        if (event.target == document.getElementById('logout-sessions-form')) {
            document.getElementById('logout-sessions-form').style.display = 'none';
        }
    });

    // --- Sign / Login buttons ---
    const signBtn = document.getElementById('signButton');
    const logBtn = document.getElementById('logButton');

    if (signBtn && logBtn) {
        signBtn.addEventListener('click', () => {
            window.location.href = routes.register;
        });

        logBtn.addEventListener('click', () => {
            window.location.href = routes.login;
        });
    }

    // --- Highlight current page ---
    const currentPage = window.location.pathname;
    const signButton = document.querySelector('.btn-sign');
    const logButton = document.querySelector('.btn-log');

    if (currentPage === '/register' && signButton) {
        signButton.classList.add('highlight');
    } else if (currentPage === '/login' && logButton) {
        logButton.classList.add('highlight');
    }

    // --- INITIALIZE ALL DROPDOWNS HERE ---

    // 1. Regular custom dropdowns (for create user page)
    document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
        const selected = dropdown.querySelector('.dropdown-selected');
        const options = dropdown.querySelector('.dropdown-roles');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');

        console.log('Initializing dropdown:', { dropdown, selected, options, hiddenInput });

        if (!selected || !options || !hiddenInput) {
            console.warn('Dropdown missing required elements');
            return;
        }

        // Toggle on click
        selected.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('active');
            console.log('Dropdown toggled, active:', dropdown.classList.contains('active'));
        });

        // Handle option selection
        options.querySelectorAll('li').forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();
                selected.textContent = option.textContent;
                hiddenInput.value = option.dataset.value;
                dropdown.classList.remove('active');
                console.log('Option selected:', option.textContent, 'value:', option.dataset.value);
            });
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    });

    // 2. User role dropdowns (for users table)
    initUserRoleDropdowns();

    // 3. Livewire integration
    if (typeof Livewire !== 'undefined') {
        console.log('Livewire detected, setting up hooks');
        Livewire.hook('message.processed', () => {
            console.log('Livewire update - reinitializing dropdowns');
            initUserRoleDropdowns();
        });
    }

    // --- Filter Menu Scrolling ---
    initializeFilterScroll();

    // 4. Mini chart function definition
    function miniChart(canvasId, data, color) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', '', '', '', '', ''],
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: 'transparent',
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 0,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                },
                scales: {
                    x: { display: false },
                    y: { display: false }
                }
            }
        });
    }

    // 5. Create mini charts
    miniChart('incomeMini',    [120,140,160,150,180,200], '#22c55e');
    miniChart('ordersMini',    [30,40,35,50,60,55],       '#3b82f6');
    miniChart('customersMini', [10,20,18,25,30,28],       '#f59e0b');
    miniChart('visitorsMini',  [200,300,250,400,450,500], '#ef4444');

    // 6. Orders chart with fixed height
    const ordersCtx = document.getElementById('ordersChart');
    if (ordersCtx) {
        new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [{
                    label: 'Orders',
                    data: [12, 19, 8, 15, 22, 30, 25],
                    borderColor: '#e63946',
                    backgroundColor: 'rgba(230,57,70,0.2)',
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }

    // 7. Revenue data definition
    const revenueData = {
        daily: {
            labels: ['6am', '9am', '12pm', '3pm', '6pm', '9pm', '12am'],
            data: [45, 120, 180, 140, 220, 150, 60],
            title: 'Daily Revenue'
        },
        weekly: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            data: [120, 190, 80, 150, 220, 300, 250],
            title: 'Weekly Revenue'
        },
        monthly: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            data: [850, 920, 780, 1050],
            title: 'Monthly Revenue'
        },
        yearly: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            data: [3200, 3800, 3500, 4100, 4200, 3900, 4500, 4800, 4600, 5000, 5200, 5800],
            title: 'Yearly Revenue'
        }
    };

    // 8. Revenue chart with time period toggle
    const revenueCtx = document.getElementById('revenueChart');
    let revenueChart = null;

    if (revenueCtx) {
        revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: revenueData.weekly.labels,
                datasets: [{
                    label: 'Revenue',
                    data: revenueData.weekly.data,
                    backgroundColor: '#457b9d'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }

    // 9. Time period button functionality
    const periodButtons = document.querySelectorAll('.period-btn');

    if (periodButtons.length > 0) {
        periodButtons.forEach(btn => {
            if (btn.dataset.period === 'weekly') {
                btn.classList.add('active');
            }
        });

        periodButtons.forEach(button => {
            button.addEventListener('click', function() {
                periodButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const period = this.dataset.period;
                const graphCard = this.closest('.graph');
                const graphTitle = graphCard.querySelector('.graph-title');

                if (graphTitle) {
                    graphTitle.textContent = revenueData[period].title;
                }

                if (revenueChart) {
                    revenueChart.data.labels = revenueData[period].labels;
                    revenueChart.data.datasets[0].data = revenueData[period].data;
                    revenueChart.update();
                }
            });
        });
    }

    // --- Initialize menu page listeners ---
    setupMenuPageListeners();
});

// ===== FUNCTION DEFINITIONS (outside DOMContentLoaded) =====

function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var wrapper = passwordInput ? passwordInput.closest('.password-input-wrapper') : null;
    var eyeIcon = wrapper ? wrapper.querySelector('.eye-icon') : null;

    if (!passwordInput) {
        console.warn('Password input not found');
        return;
    }

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        if (eyeIcon && eyeIcon.dataset.open) eyeIcon.src = eyeIcon.dataset.open;
    } else {
        passwordInput.type = "password";
        if (eyeIcon && eyeIcon.dataset.closed) eyeIcon.src = eyeIcon.dataset.closed;
    }
}

function toggleUsersDropdown() {
    var menu = document.getElementById('usersDropdownMenu');
    if (!menu) {
        console.warn('usersDropdownMenu not found');
        return;
    }

    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    var dropdown = document.querySelector('.users-dropdown');
    var menu = document.getElementById('usersDropdownMenu');

    if (!dropdown || !menu) return;

    if (!dropdown.contains(event.target)) {
        menu.style.display = 'none';
    }
});

function initUserRoleDropdowns() {
    console.log('Initializing user role dropdowns');
    document.querySelectorAll('.custom-dropdown-roles').forEach(dropdown => {
        if (dropdown.dataset.initialized === 'true') {
            console.log('Dropdown already initialized, skipping');
            return;
        }

        dropdown.dataset.initialized = 'true';
        console.log('Initializing dropdown:', dropdown);

        const selected = dropdown.querySelector('.dropdown-selected-users');
        const options = dropdown.querySelector('.dropdown-roles');
        const input = dropdown.querySelector('input[name="role"]');
        const form = dropdown;

        if (!selected || !options || !input || !form) {
            console.warn('User role dropdown missing elements');
            return;
        }

        selected.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });

        options.querySelectorAll('.role-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                if (item.dataset.role && input) {
                    input.value = item.dataset.role;
                }
                if (selected && item.textContent) {
                    selected.textContent = item.textContent;
                }
                dropdown.classList.remove('active');
                if (form.submit) form.submit();
            });
        });
    });
}

// Initialize global click handler only once
if (!window.__userRoleDropdownGlobalClick) {
    window.__userRoleDropdownGlobalClick = true;

    document.addEventListener('click', () => {
        document.querySelectorAll('.custom-dropdown-roles.active').forEach(d => {
            if (d.classList) d.classList.remove('active');
        });
    });
}

// --- Filter Scroll Functions ---
function initializeFilterScroll() {
    const filterMenu = document.getElementById('filterMenu');
    const scrollLeftBtn = document.querySelector('.scroll-btn-left');
    const scrollRightBtn = document.querySelector('.scroll-btn-right');

    if (!filterMenu || !scrollLeftBtn || !scrollRightBtn) {
        console.log('Filter menu elements not found, skipping initialization');
        return;
    }

    console.log('Initializing filter scroll');

    updateFilterArrows();

    window.addEventListener('resize', updateFilterArrows);

    if (typeof Livewire !== 'undefined') {
        Livewire.hook('message.processed', updateFilterArrows);
    }
}

function scrollFilters(amount) {
    const filterMenu = document.getElementById('filterMenu');
    if (!filterMenu) return;

    const buttons = filterMenu.querySelectorAll('.filter-btn, .filter-menu-btn');
    if (buttons.length === 0) return;

    const buttonWidth = buttons[0].offsetWidth;
    const computedStyle = window.getComputedStyle(filterMenu);
    const gap = parseFloat(computedStyle.gap) || 15;
    const scrollAmount = (buttonWidth + gap) * 2.5;

    filterMenu.scrollBy({
        left: amount > 0 ? scrollAmount : -scrollAmount,
        behavior: 'smooth'
    });

    setTimeout(updateFilterArrows, 300);
}

function updateFilterArrows() {
    const container = document.getElementById('filterMenu');
    const leftArrow = document.querySelector('.scroll-arrow.left, .scroll-btn-left');
    const rightArrow = document.querySelector('.scroll-arrow.right, .scroll-btn-right');

    if (!container || !leftArrow || !rightArrow) return;

    const hasOverflow = container.scrollWidth > container.clientWidth;

    if (!hasOverflow) {
        leftArrow.classList.add('hidden');
        rightArrow.classList.add('hidden');
        return;
    }

    const scrollLeft = container.scrollLeft;
    const maxScroll = container.scrollWidth - container.clientWidth;

    leftArrow.classList.toggle('hidden', scrollLeft <= 5);
    rightArrow.classList.toggle('hidden', scrollLeft >= maxScroll - 5);
}

// Optional: Add error boundary for unhandled errors
window.addEventListener('error', function(e) {
    console.error('Unhandled error:', e.error);
    return false;
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled promise rejection:', e.reason);
});

// ===== MENU ITEM PAGE FUNCTIONALITY =====
let selectedSizes = {};
let selectedToppings = {};

function setupMenuPageListeners() {
    // Size button event listeners
    document.querySelectorAll('.size-btn').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const size = this.getAttribute('data-size');
            selectSize(itemId, size, this);
        });
    });

    // Custom toppings dropdown listeners
    document.querySelectorAll('.dropdown-trigger').forEach(trigger => {
        trigger.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            toggleToppingsDropdown(itemId);
        });
    });

    // Checkbox change listeners
    document.querySelectorAll('.dropdown-option input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const dropdown = this.closest('.dropdown-content');
            const itemId = dropdown.id.replace('toppingsDropdown_', '');
            updateSelectedToppingsFromCheckboxes(itemId);
        });
    });

    // Add to cart button event listeners
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const category = this.getAttribute('data-category');
            addToCart(itemId, category);
        });
    });
}

function selectSize(itemId, size, button) {
    document.querySelectorAll(`.size-btn[data-item-id="${itemId}"]`).forEach(btn => {
        btn.classList.remove('size-btn-active');
        btn.classList.remove('bg-blue-600', 'text-white');
    });

    button.classList.add('size-btn-active');
    selectedSizes[itemId] = size;
    updateAddToCartButton(itemId);
}

function toggleToppingsDropdown(itemId) {
    const trigger = document.getElementById(`toppingsTrigger_${itemId}`);
    const dropdown = document.getElementById(`toppingsDropdown_${itemId}`);

    if (!trigger || !dropdown) return;

    trigger.classList.toggle('active');
    dropdown.classList.toggle('active');

    document.querySelectorAll('.dropdown-content.active').forEach(otherDropdown => {
        if (otherDropdown !== dropdown) {
            otherDropdown.classList.remove('active');
            const otherTriggerId = otherDropdown.id.replace('toppingsDropdown_', 'toppingsTrigger_');
            const otherTrigger = document.getElementById(otherTriggerId);
            if (otherTrigger) {
                otherTrigger.classList.remove('active');
            }
        }
    });
}

function updateSelectedToppingsFromCheckboxes(itemId) {
    const dropdown = document.getElementById(`toppingsDropdown_${itemId}`);
    if (!dropdown) return;

    const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]:checked');
    selectedToppings[itemId] = Array.from(checkboxes).map(checkbox => ({
        value: checkbox.value,
        text: checkbox.parentElement.textContent.trim()
    }));

    const trigger = document.getElementById(`toppingsTrigger_${itemId}`);
    if (trigger) {
        const placeholder = trigger.querySelector('.placeholder');
        if (placeholder) {
            placeholder.textContent = selectedToppings[itemId].length === 0
                ? 'Select extra toppings...'
                : `${selectedToppings[itemId].length} topping(s) selected`;
        }
    }

    updateSelectedToppingsDisplay(itemId);
    updateAddToCartButton(itemId);
}

function updateSelectedToppingsDisplay(itemId) {
    const container = document.getElementById(`selectedToppings_${itemId}`);
    if (!container) return;

    if (!selectedToppings[itemId] || selectedToppings[itemId].length === 0) {
        container.innerHTML = '<span class="text-gray-500 text-sm">No extra toppings selected</span>';
        return;
    }

    let html = '';
    selectedToppings[itemId].forEach((topping) => {
        html += `
            <div class="selected-topping-item inline-flex items-center bg-green-100 text-green-800 px-2 py-1 rounded mr-2 mb-1">
                <span class="text-sm">${topping.text}</span>
                <button
                    type="button"
                    class="remove-topping-btn ml-1 text-green-600 hover:text-green-800"
                    data-item-id="${itemId}"
                    data-topping="${topping.value}"
                    onclick="removeTopping('${itemId}', '${topping.value}')"
                >
                    &times;
                </button>
            </div>
        `;
    });

    container.innerHTML = html;
}

function removeTopping(itemId, toppingValue) {
    if (!selectedToppings[itemId]) return;

    const toppingIndex = selectedToppings[itemId].findIndex(t => t.value === toppingValue);
    if (toppingIndex !== -1) {
        selectedToppings[itemId].splice(toppingIndex, 1);

        const dropdown = document.getElementById(`toppingsDropdown_${itemId}`);
        if (dropdown) {
            const checkbox = dropdown.querySelector(`input[value="${toppingValue}"]`);
            if (checkbox) checkbox.checked = false;
        }

        const trigger = document.getElementById(`toppingsTrigger_${itemId}`);
        if (trigger) {
            const placeholder = trigger.querySelector('.placeholder');
            if (placeholder) {
                placeholder.textContent = selectedToppings[itemId].length === 0
                    ? 'Select extra toppings...'
                    : `${selectedToppings[itemId].length} topping(s) selected`;
            }
        }

        updateSelectedToppingsDisplay(itemId);
        updateAddToCartButton(itemId);
    }
}

function updateAddToCartButton(itemId) {
    const addToCartBtn = document.getElementById(`addToCartBtn_${itemId}`);
    if (!addToCartBtn) return;

    const category = addToCartBtn.getAttribute('data-category');

    if (category === 'pizza') {
        addToCartBtn.disabled = !selectedSizes[itemId];
    } else {
        addToCartBtn.disabled = false;
    }
}

function addToCart(itemId, category) {
    const itemName = document.querySelector('.h2-description')?.textContent?.trim() || 'Menu Item';

    const itemData = {
        id: itemId,
        name: itemName,
        price: 0,
        size: selectedSizes[itemId] || null,
        extraToppings: selectedToppings[itemId] || [],
        quantity: 1
    };

    console.log('Adding to cart:', itemData);

    const sizeText = itemData.size ? `Size: ${itemData.size}` : 'No size selected';
    const toppingsCount = itemData.extraToppings.length;
    const toppingsText = toppingsCount > 0 ? `, ${toppingsCount} extra topping(s)` : '';

    alert(`"${itemData.name}" added to cart! (${sizeText}${toppingsText})`);
}

// Close toppings dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.custom-multiselect')) {
        document.querySelectorAll('.dropdown-content.active').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        document.querySelectorAll('.dropdown-trigger.active').forEach(trigger => {
            trigger.classList.remove('active');
        });
    }
});

// ===== PROFILE PHOTO CROP =====
let cropper;
let originalFile;

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
}

function getRouteUrls() {
    const form = document.querySelector('.profile-form');
    return {
        profileUpdate: form?.getAttribute('data-profile-update-route') || ''
    };
}

document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photoInput');

    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                originalFile = file;
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('cropImage').src = e.target.result;
                    document.getElementById('cropModal').style.display = 'flex';

                    setTimeout(() => {
                        const image = document.getElementById('cropImage');
                        if (cropper) cropper.destroy();
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                            viewMode: 1,
                            dragMode: 'move',
                            autoCropArea: 1,
                            cropBoxMovable: true,
                            cropBoxResizable: true,
                            background: false,
                            guides: true,
                            center: true,
                            highlight: true,
                            minContainerWidth: 500,
                            minContainerHeight: 400,
                        });
                    }, 100);
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

function closeCropModal() {
    document.getElementById('cropModal').style.display = 'none';
    document.getElementById('photoInput').value = '';
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
}

function applyCrop() {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    canvas.toBlob(function(blob) {
        const formData = new FormData();
        formData.append('photo', blob, 'profile.jpg');
        formData.append('_method', 'PATCH');
        formData.append('_token', getCsrfToken());

        const urls = getRouteUrls();

        fetch(urls.profileUpdate, {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) window.location.reload();
        });
    }, 'image/jpeg', 0.95);

    closeCropModal();
}

// ===== API TOKENS =====
function showPermissionsModal(tokenId, tokenName, abilities) {
    const permissionsModal = document.getElementById('permissionsModal');
    const permissionsForm = document.getElementById('permissionsForm');
    const permissionsTokenName = document.getElementById('permissionsTokenName');

    permissionsModal.style.display = 'flex';
    permissionsForm.action = window.apiTokensBaseUrl + '/' + tokenId;
    permissionsTokenName.textContent = 'Editing permissions for: ' + tokenName;

    document.querySelectorAll('.modal-permission-checkbox').forEach(cb => {
        cb.checked = abilities.includes(cb.value) || abilities.includes('*');
    });
}

function closePermissionsModal() {
    document.getElementById('permissionsModal').style.display = 'none';
}

function confirmDelete(tokenId, tokenName) {
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModalText = document.getElementById('deleteModalText');

    deleteModal.style.display = 'flex';
    deleteForm.action = window.apiTokensBaseUrl + '/' + tokenId;
    deleteModalText.textContent = 'Are you sure you want to delete "' + tokenName + '"?';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

window.onclick = function(event) {
    const permissionsModal = document.getElementById('permissionsModal');
    const deleteModal = document.getElementById('deleteModal');
    const tokenModal = document.getElementById('tokenModal');
    const cropModal = document.getElementById('cropModal');

    if (event.target === permissionsModal) permissionsModal.style.display = 'none';
    if (event.target === deleteModal) deleteModal.style.display = 'none';
    if (event.target === tokenModal) tokenModal.style.display = 'none';
    if (event.target === cropModal) closeCropModal();
};

// ===== CLOSE DETAIL PANEL =====
function closeDetailPanel() {
    if (typeof Livewire !== 'undefined') {
        Livewire.dispatch('closePanel');
        Livewire.find(document.querySelector('[wire\\:id]')?.getAttribute('wire:id'))
            ?.set('selectedItem', null);
    }
}

document.addEventListener('click', function(e) {
    if (e.target.closest('.panel-close') || e.target.closest('.panel-overlay')) {
        closeDetailPanel();
    }
});

if (typeof Livewire !== 'undefined') {
    Livewire.on('close-panel', () => {
        Livewire.dispatch('closePanel');
    });
}

// ===== FAQ =====
// toggleFaq is called via inline onclick="toggleFaq(this)" in the HTML
function toggleFaq(element) {
    const faqItem = element.closest('.faq-item');
    const answer = faqItem.querySelector('.faq-answer');
    const arrow = element.querySelector('.faq-arrow');
    const container = document.querySelector('.faq-container');

    const width = window.innerWidth;

    document.querySelectorAll('.faq-item.active').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.maxHeight = null;
            item.querySelector('.faq-arrow').textContent = '▼';
        }
    });

    faqItem.classList.toggle('active');

    if (faqItem.classList.contains('active')) {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        arrow.textContent = '▲';

        if (width >= 501 && width <= 768) {
            container.style.height = '62rem';
        } else if (width >= 769 && width <= 1023) {
            container.style.height = '56rem';
        } else if (width >= 320 && width <= 500) {
            container.style.height = '62rem';
        }
    } else {
        answer.style.maxHeight = null;
        arrow.textContent = '▼';

        if (width >= 501 && width <= 768) {
            container.style.height = '59rem';
        } else if (width >= 769 && width <= 1023) {
            container.style.height = '50rem';
        } else if (width >= 320 && width <= 500) {
            container.style.height = '56rem';
        }
    }
}