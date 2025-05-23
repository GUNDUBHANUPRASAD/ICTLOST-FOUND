// Sample data - in a real app, this would come from a backend API
const sampleLostItems = [
    {
        id: 1,
        name: "MacBook Pro 2020",
        category: "laptop",
        description: "Space Gray, 13-inch, with a sticker of university logo on the back",
        serial: "ICT-2020-MBP-001",
        location: "Computer Lab 3",
        date: "2023-05-15",
        contact: "john.doe@ictdept.edu",
        status: "lost",
        image: null
    },
    {
        id: 2,
        name: "Logitech Wireless Mouse",
        category: "accessory",
        description: "Black, model M185, slightly worn left button",
        serial: "",
        location: "ICT Building 2nd floor lounge",
        date: "2023-05-20",
        contact: "sarah@ictdept.edu",
        status: "lost",
        image: null
    }
];

const sampleFoundItems = [
    {
        id: 1,
        name: "USB Flash Drive 64GB",
        category: "storage",
        description: "SanDisk, red color, with keychain attachment",
        serial: "",
        location: "Found in ICT Department printer room",
        currentLocation: "ICT Office, drawer #3",
        date: "2023-05-18",
        contact: "reception@ictdept.edu",
        status: "found",
        image: null
    },
    {
        id: 2,
        name: "iPhone Charger",
        category: "accessory",
        description: "White Apple original charger, 1m length",
        serial: "",
        location: "Found near coffee machine in staff room",
        currentLocation: "ICT Lost & Found box",
        date: "2023-05-22",
        contact: "reception@ictdept.edu",
        status: "found",
        image: null
    }
];

// DOM Elements
const sections = {
    home: document.getElementById('home-section'),
    reportLost: document.getElementById('report-lost-section'),
    reportFound: document.getElementById('report-found-section'),
    search: document.getElementById('search-section'),
    login: document.getElementById('login-section')
};

const navLinks = {
    home: document.getElementById('home-link'),
    reportLost: document.getElementById('report-lost-link'),
    reportFound: document.getElementById('report-found-link'),
    search: document.getElementById('search-link'),
    login: document.getElementById('login-link')
};

const buttons = {
    reportLost: document.getElementById('report-lost-btn'),
    reportFound: document.getElementById('report-found-btn'),
    search: document.getElementById('search-btn')
};

const forms = {
    lostItem: document.getElementById('lost-item-form'),
    foundItem: document.getElementById('found-item-form'),
    login: document.getElementById('login-form')
};

const modals = {
    item: document.getElementById('item-modal'),
    close: document.querySelector('.close-modal'),
    content: document.getElementById('modal-content')
};

// Initialize the app
function init() {
    // Load sample data
    renderLostItems();
    renderFoundItems();
    
    // Set up event listeners
    setupNavigation();
    setupForms();
    setupModals();
    
    // Show home section by default
    showSection('home');
}

// Set up navigation
function setupNavigation() {
    navLinks.home.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('home');
    });
    
    navLinks.reportLost.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('reportLost');
    });
    
    navLinks.reportFound.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('reportFound');
    });
    
    navLinks.search.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('search');
    });
    
    navLinks.login.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('login');
    });
    
    buttons.reportLost.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('reportLost');
    });
    
    buttons.reportFound.addEventListener('click', (e) => {
        e.preventDefault();
        showSection('reportFound');
    });
    
    buttons.search.addEventListener('click', () => {
        performSearch();
    });
}

// Show a specific section and hide others
function showSection(sectionName) {
    // Hide all sections first
    Object.values(sections).forEach(section => {
        section.classList.add('hidden');
    });
    
    // Remove active class from all nav links
    Object.values(navLinks).forEach(link => {
        link.classList.remove('active');
    });
    
    // Show the requested section
    sections[sectionName].classList.remove('hidden');
    
    // Add active class to the corresponding nav link
    if (navLinks[sectionName]) {
        navLinks[sectionName].classList.add('active');
    }
    
    // Special cases
    if (sectionName === 'search') {
        // Clear and perform initial search when search section is shown
        document.getElementById('search-input').value = '';
        document.getElementById('filter-category').value = '';
        document.getElementById('filter-status').value = '';
        document.getElementById('filter-date').value = '';
        performSearch();
    }
}

// Set up form submissions
function setupForms() {
    forms.lostItem.addEventListener('submit', (e) => {
        e.preventDefault();
        reportLostItem();
    });
    
    forms.foundItem.addEventListener('submit', (e) => {
        e.preventDefault();
        reportFoundItem();
    });
    
    forms.login.addEventListener('submit', (e) => {
        e.preventDefault();
        login();
    });
}

// Report a lost item
function reportLostItem() {
    const formData = {
        name: document.getElementById('lost-item-name').value,
        category: document.getElementById('lost-item-category').value,
        description: document.getElementById('lost-item-description').value,
        serial: document.getElementById('lost-item-serial').value,
        location: document.getElementById('lost-item-location').value,
        date: document.getElementById('lost-item-date').value,
        contact: document.getElementById('lost-item-contact').value,
        image: document.getElementById('lost-item-image').files[0],
        status: 'lost'
    };
    
    // In a real app, you would send this to your backend
    console.log('Reporting lost item:', formData);
    
    // Add to sample data (temporary)
    const newItem = {
        id: sampleLostItems.length + 1,
        ...formData
    };
    sampleLostItems.push(newItem);
    
    // Show success message
    alert('Lost item reported successfully!');
    
    // Reset form
    forms.lostItem.reset();
    
    // Update displayed items
    renderLostItems();
    
    // Return to home
    showSection('home');
}

// Report a found item
function reportFoundItem() {
    const formData = {
        name: document.getElementById('found-item-name').value,
        category: document.getElementById('found-item-category').value,
        description: document.getElementById('found-item-description').value,
        serial: document.getElementById('found-item-serial').value,
        location: document.getElementById('found-item-location').value,
        currentLocation: document.getElementById('found-item-current-location').value,
        date: document.getElementById('found-item-date').value,
        contact: document.getElementById('found-item-contact').value,
        image: document.getElementById('found-item-image').files[0],
        status: 'found'
    };
    
    // In a real app, you would send this to your backend
    console.log('Reporting found item:', formData);
    
    // Add to sample data (temporary)
    const newItem = {
        id: sampleFoundItems.length + 1,
        ...formData
    };
    sampleFoundItems.push(newItem);
    
    // Show success message
    alert('Found item reported successfully!');
    
    // Reset form
    forms.foundItem.reset();
    
    // Update displayed items
    renderFoundItems();
    
    // Return to home
    showSection('home');
}

// Login function
function login() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    // In a real app, you would validate and send to backend
    console.log('Login attempt:', { email, password });
    
    // For demo purposes, just show an alert
    alert('Login functionality would connect to your backend in a real application.');
    
    // Reset form
    forms.login.reset();
}

// Render lost items on home page
function renderLostItems() {
    const container = document.getElementById('lost-items-grid');
    container.innerHTML = '';
    
    // Get the 3 most recent lost items
    const recentLost = [...sampleLostItems]
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .slice(0, 3);
    
    recentLost.forEach(item => {
        const itemElement = createItemCard(item);
        container.appendChild(itemElement);
    });
}

// Render found items on home page
function renderFoundItems() {
    const container = document.getElementById('found-items-grid');
    container.innerHTML = '';
    
    // Get the 3 most recent found items
    const recentFound = [...sampleFoundItems]
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .slice(0, 3);
    
    recentFound.forEach(item => {
        const itemElement = createItemCard(item);
        container.appendChild(itemElement);
    });
}

// Create an item card element
function createItemCard(item) {
    const card = document.createElement('div');
    card.className = 'item-card';
    card.dataset.id = item.id;
    card.dataset.status = item.status;
    
    let iconClass;
    switch(item.category) {
        case 'laptop': iconClass = 'fas fa-laptop'; break;
        case 'phone': iconClass = 'fas fa-mobile-alt'; break;
        case 'storage': iconClass = 'fas fa-hdd'; break;
        case 'accessory': iconClass = 'fas fa-keyboard'; break;
        default: iconClass = 'fas fa-question-circle';
    }
    
    card.innerHTML = `
        <div class="item-image">
            <i class="${iconClass}"></i>
        </div>
        <div class="item-details">
            <h4>${item.name}</h4>
            <p><i class="fas fa-map-marker-alt"></i> ${item.location}</p>
            <p><i class="far fa-calendar-alt"></i> ${formatDate(item.date)}</p>
            <span class="item-status status-${item.status}">${item.status.toUpperCase()}</span>
        </div>
    `;
    
    card.addEventListener('click', () => {
        showItemDetails(item);
    });
    
    return card;
}

// Perform search
function performSearch() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    const categoryFilter = document.getElementById('filter-category').value;
    const statusFilter = document.getElementById('filter-status').value;
    const dateFilter = document.getElementById('filter-date').value;
    
    const resultsContainer = document.getElementById('search-results');
    resultsContainer.innerHTML = '<p>Searching...</p>';
    
    // Combine lost and found items for search
    const allItems = [
        ...sampleLostItems.map(item => ({ ...item, type: 'lost' })),
        ...sampleFoundItems.map(item => ({ ...item, type: 'found' }))
    ];
    
    // Filter items
    let filteredItems = allItems.filter(item => {
        // Search term
        const matchesSearch = 
            item.name.toLowerCase().includes(searchTerm) ||
            item.description.toLowerCase().includes(searchTerm) ||
            item.location.toLowerCase().includes(searchTerm);
        
        // Category filter
        const matchesCategory = categoryFilter ? item.category === categoryFilter : true;
        
        // Status filter
        const matchesStatus = statusFilter ? item.status === statusFilter : true;
        
        // Date filter
        const matchesDate = dateFilter ? item.date === dateFilter : true;
        
        return matchesSearch && matchesCategory && matchesStatus && matchesDate;
    });
    
    // Sort by date (newest first)
    filteredItems.sort((a, b) => new Date(b.date) - new Date(a.date));
    
    // Display results
    if (filteredItems.length === 0) {
        resultsContainer.innerHTML = '<p>No items found matching your search criteria.</p>';
        return;
    }
    
    resultsContainer.innerHTML = '';
    filteredItems.forEach(item => {
        const resultElement = createSearchResultItem(item);
        resultsContainer.appendChild(resultElement);
    });
}

// Create a search result item
function createSearchResultItem(item) {
    const result = document.createElement('div');
    result.className = 'result-item';
    
    let iconClass;
    switch(item.category) {
        case 'laptop': iconClass = 'fas fa-laptop'; break;
        case 'phone': iconClass = 'fas fa-mobile-alt'; break;
        case 'storage': iconClass = 'fas fa-hdd'; break;
        case 'accessory': iconClass = 'fas fa-keyboard'; break;
        default: iconClass = 'fas fa-question-circle';
    }
    
    result.innerHTML = `
        <div class="result-image">
            <i class="${iconClass}"></i>
        </div>
        <div class="result-details">
            <h4>${item.name}</h4>
            <p><strong>Status:</strong> <span class="status-${item.status}">${item.status.toUpperCase()}</span></p>
            <p><strong>Location:</strong> ${item.location}</p>
            <p><strong>Date:</strong> ${formatDate(item.date)}</p>
            ${item.type === 'found' ? `<p><strong>Current Location:</strong> ${item.currentLocation}</p>` : ''}
        </div>
        <div class="result-actions">
            <button class="btn primary" data-id="${item.id}" data-type="${item.type}">View Details</button>
        </div>
    `;
    
    // Add click event to the view button
    const viewButton = result.querySelector('.btn');
    viewButton.addEventListener('click', (e) => {
        e.stopPropagation();
        const itemId = parseInt(e.target.dataset.id);
        const itemType = e.target.dataset.type;
        
        const item = itemType === 'lost' 
            ? sampleLostItems.find(i => i.id === itemId)
            : sampleFoundItems.find(i => i.id === itemId);
            
        if (item) {
            showItemDetails(item);
        }
    });
    
    return result;
}

// Show item details in modal
function showItemDetails(item) {
    modals.content.innerHTML = '';
    
    let iconClass;
    switch(item.category) {
        case 'laptop': iconClass = 'fas fa-laptop'; break;
        case 'phone': iconClass = 'fas fa-mobile-alt'; break;
        case 'storage': iconClass = 'fas fa-hdd'; break;
        case 'accessory': iconClass = 'fas fa-keyboard'; break;
        default: iconClass = 'fas fa-question-circle';
    }
    
    const details = document.createElement('div');
    details.className = 'modal-item';
    
    details.innerHTML = `
        <div class="modal-image">
            <i class="${iconClass}"></i>
        </div>
        <div class="modal-details">
            <h3>${item.name}</h3>
            <p><span class="detail-label">Status:</span> <span class="status-${item.status}">${item.status.toUpperCase()}</span></p>
            <p><span class="detail-label">Category:</span> ${item.category.charAt(0).toUpperCase() + item.category.slice(1)}</p>
            <p><span class="detail-label">Description:</span> ${item.description}</p>
            ${item.serial ? `<p><span class="detail-label">Serial/Asset #:</span> ${item.serial}</p>` : ''}
            <p><span class="detail-label">${item.status === 'lost' ? 'Lost' : 'Found'} Location:</span> ${item.location}</p>
            ${item.status === 'found' ? `<p><span class="detail-label">Current Location:</span> ${item.currentLocation}</p>` : ''}
            <p><span class="detail-label">Date ${item.status === 'lost' ? 'Lost' : 'Found'}:</span> ${formatDate(item.date)}</p>
            <p><span class="detail-label">Contact:</span> ${item.contact}</p>
        </div>
    `;
    
    modals.content.appendChild(details);
    modals.item.classList.remove('hidden');
}

// Set up modal functionality
function setupModals() {
    modals.close.addEventListener('click', () => {
        modals.item.classList.add('hidden');
    });
    
    window.addEventListener('click', (e) => {
        if (e.target === modals.item) {
            modals.item.classList.add('hidden');
        }
    });
}

// Helper function to format dates
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

// Initialize the app when DOM is loaded
document.addEventListener('DOMContentLoaded', init);