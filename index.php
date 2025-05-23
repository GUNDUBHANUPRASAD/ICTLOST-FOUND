<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ICT Department Lost & Found</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #fff;
      z-index: 1000;
      padding: 1rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .form-container {
        z-index: 1;
    }

    body {
      padding-top: 10px;
    }
    #lostForm {
      position: relative;
      z-index: 1;
      margin-top: px;
    }

    #home-section {
        padding: 10px;
        background: linear-gradient(to right, #00416A, #E4E5E6);
        color: white;
    }

    .hero {
        text-align: center;
        margin-bottom: 10px;
    }

    .hero h2 {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2em;
        max-width: 600px;
        margin: 0 auto;
    }

    .button-container {
        text-align: center;
        margin: 30px 0;
    }

    .btn {
        font-size: 1em;
        padding: 12px 24px;
        margin: 10px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn.primary {
        background-color: #007BFF;
        color: white;
    }

    .btn.secondary {
        background-color: #28A745;
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }

    .notifications {
        background-color: rgba(255,255,255,0.2);
        color: #fff;
        padding: 10px 15px;
        border-radius: 10px;
        margin-bottom: 25px;
        font-weight: bold;
    }

    /* Recent Items */
    .recent-items {
        margin-top: 40px;
    }

    .recent-items h3 {
        color: white;
        margin-bottom: 20px;
        font-size: 1.5rem;
        padding-bottom: 8px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }

    /* Items Grid */
    .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    /* Item Card */
    .item-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .item-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .item-image {
        height: 180px;
        background-color: #f5f5f5;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        padding: 15px;
    }

    .item-details h4 {
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .item-details p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .item-status {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 10px;
    }

    .status-lost {
        background-color: #ffcdd2;
        color: #c62828;
    }

    .status-found {
        background-color: #c8e6c9;
        color: #2e7d32;
    }

    .status-claimed {
        background-color: #e1f5fe;
        color: #0277bd;
    }
    
    .hidden {
        display: none !important;
    }
    
    /* Search Section Styles */
    #search-section {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin: 20px 0;
    }
    
    .search-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    #search-input {
        flex: 1;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-right: 10px;
        font-size: 1rem;
    }
    
    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .filter-options select,
    .filter-options input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: white;
    }
    
    .search-results {
        margin-top: 20px;
    }
    
    .search-result-item {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
    }
    
    .search-result-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 15px;
    }
    
    .search-result-details {
        flex: 1;
    }
    
    .search-result-details h4 {
        margin-bottom: 5px;
        color: #333;
    }
    
    .search-result-meta {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: 10px;
        font-size: 0.9rem;
        color: #666;
    }
    
    .no-results {
        text-align: center;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 8px;
        color: #666;
    }
    
    /* Add search button to navbar */
    .nav-search-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        color: white;
        background-color: #007BFF;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .nav-search-btn:hover {
        background-color: #0069d9;
    }
  </style>
</head>
<body>
  <main>
    <section id="home-section">
      <div class="hero">
          <h2><i class="fas fa-search-location"></i> Misplaced Your Device?</h2>
          <p>We're here to help! Report a lost gadget or check for found items from the ICT department.</p>
          <marquee behavior="scroll" direction="left">
              📣 USB Drive found in Lab 1 — reported 2 hours ago | Lost: White iPad in ICT Room 3 | Found: Power Bank outside Library
          </marquee>
      </div>
    </section>
    
    <div class="notifications"></div>

    <div class="button-container" id="action-buttons">
        <button id="report-lost-btn" class="btn primary">
            <i class="fas fa-exclamation-circle"></i> Report Lost Item
        </button>
        <button id="report-found-btn" class="btn secondary">
            <i class="fas fa-check-circle"></i> Report Found Item
        </button>
        <button id="search-items-btn" class="btn primary">
            <i class="fas fa-search"></i> Search Items
        </button>
    </div>

    <div class="recent-items" id="lost-items">
        <h3>Lost Items</h3>
            <div class="items-grid">
                <?php include('fetch_lost_items.php'); ?>
            </div>

        <h3>Recently Found Items</h3>
        <div class="items-grid" id="found-items-grid">
            <?php include('fetch_found_items.php'); ?>
        </div>
    </div>
            
    <!-- Report Lost Section -->
    <section id="report-lost-section" class="hidden">
        <h2>Report Lost Item</h2>
        <form id="lost-item-form" method="POST" action="submit_lost_item.php" enctype="multipart/form-data">
    
            <div class="form-group">
                <label for="lost-item-name">Item Name*</label>
                <input type="text" id="lost-item-name" name="item_name" required
                placeholder="e.g., MacBook Pro, USB Drive">
            </div>
        
            <div class="form-group">
                <label for="lost-item-category">Category*</label>
                <select id="lost-item-category" name="category" required>
                    <option value="">Select category</option>
                    <option value="laptop">Laptop</option>
                    <option value="phone">Phone/Tablet</option>
                    <option value="accessory">Accessory (Charger, Mouse, etc.)</option>
                    <option value="storage">Storage Device (USB, HDD)</option>
                    <option value="other">Other</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="lost-item-description">Description*</label>
                <textarea id="lost-item-description" name="description" required
                placeholder="Detailed description including brand, model, color, distinguishing features"></textarea>
            </div>
        
            <div class="form-group">
                <label for="lost-item-location">Where was it lost?*</label>
                <input type="text" id="lost-item-location" name="location" required
                placeholder="e.g., Computer Lab 3, ICT Building 2nd floor">
            </div>
        
            <div class="form-group">
                <label for="lost-item-date">Date Lost*</label>
                <input type="date" id="lost-item-date" name="date" required>
            </div>
        
            <div class="form-group">
                <label for="lost-item-image">Upload Image (optional)</label>
                <input type="file" id="lost-item-image" name="image" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="lost-item-contact">Your Contact Information*</label>
                <input type="text" id="lost-item-contact" name="contact" required placeholder="Email or phone number">
            </div>
        
            <button type="submit" class="btn primary">Submit Report</button>
            <button type="button" class="btn secondary return-home">Back to Home</button>
        </form>
    </section>

    <!-- Report Found Section -->
    <section id="report-found-section" class="hidden">
        <h2>Report Found Item</h2>
        <form id="found-item-form" method="POST" action="submit_found_item.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="found-item-name">Item Name*</label>
                <input type="text" id="found-item-name" name="item_name" required placeholder="e.g., MacBook Pro, USB Drive">
            </div>
        
            <div class="form-group">
                <label for="found-item-category">Category*</label>
                <select id="found-item-category" name="category" required>
                    <option value="">Select category</option>
                    <option value="laptop">Laptop</option>
                    <option value="phone">Phone/Tablet</option>
                    <option value="accessory">Accessory (Charger, Mouse, etc.)</option>
                    <option value="storage">Storage Device (USB, HDD)</option>
                    <option value="other">Other</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="found-item-description">Description*</label>
                <textarea id="found-item-description" name="description" required placeholder="Detailed description including brand, model, color, distinguishing features"></textarea>
            </div>
        
            <div class="form-group">
                <label for="found-item-location">Where was it found?*</label>
                <input type="text" id="found-item-location" name="location" required placeholder="e.g., Computer Lab 3, ICT Building 2nd floor">
            </div>
        
            <div class="form-group">
                <label for="found-item-date">Date Found*</label>
                <input type="date" id="found-item-date" name="date" required>
            </div>
        
            <div class="form-group">
                <label for="found-item-image">Upload Image*</label>
                <input type="file" id="found-item-image" name="image" accept="image/*" required>
            </div>
        
            <div class="form-group">
                <label for="found-item-contact">Your Contact Information*</label>
                <input type="text" id="found-item-contact" name="contact" required placeholder="Email or phone number">
            </div>
        
            <div class="form-group">
                <label for="found-item-current-location">Current Location of Item*</label>
                <input type="text" id="found-item-current-location" name="current_location" required placeholder="Where is the item being kept now?">
            </div>
        
            <button type="submit" class="btn primary">Submit Found Item</button>
            <button type="button" class="btn secondary return-home">Back to Home</button>
        </form>
    </section>

    <!-- Search Section -->
    <section id="search-section" class="hidden">
    <h2 style="color: darkblue;"><i class="fas fa-search"></i> Search Lost & Found Items </h2>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search by item name, category, or description...">
        <button id="search-btn" class="btn primary"><i class="fas fa-search"></i> Search</button>
    </div>

    <div class="filter-options">
        <select id="filter-category">
            <option value="">All Categories</option>
            <option value="laptop">Laptop</option>
            <option value="phone">Phone/Tablet</option>
            <option value="accessory">Accessory</option>
            <option value="storage">Storage Device</option>
            <option value="other">Other</option>
        </select>

        <select id="filter-status">
            <option value="">All Statuses</option>
            <option value="lost">Lost</option>
            <option value="found">Found</option>
            <option value="claimed">Claimed</option>
        </select>

        <input type="date" id="filter-date" placeholder="Filter by date">
        <button id="clear-filters" class="btn secondary">Clear Filters</button>
    </div>

    <!-- Return to Home Button -->
    <div class="text-center" style="margin: 20px 0;">
        <button id="return-home-btn" class="btn secondary" onclick="goHome()">Return to Home</button>
    </div>

    <div id="search-results" class="search-results">
        <p class="text-center">Enter search terms or select filters to find items</p>
    </div>
</section>

    <!-- Login Section -->
    <section id="login-section" class="hidden">
        <h2>ICT Department Login</h2>
        <form id="login-form">
            <div class="form-group">
                <label for="login-email">ICT Department Email*</label>
                <input type="email" id="login-email" required placeholder="username@ictdept.edu">
            </div>

            <div class="form-group">
                <label for="login-password">Password*</label>
                <input type="password" id="login-password" required>
            </div>

            <button type="submit" class="btn primary">Login</button>
            <p class="login-note">Note: This login is for ICT department staff only. Students should use the public forms to report items.</p>
        </form>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2025 ICT Department Lost & Found Portal</p>
      <p>For support or inquiries, contact us at 
        <a href="mailto:ictlostfound@college.edu">ictlostfound@college.edu</a> or call extension 4321.</p>
      <p>Powered by the ICT Student Services & Web Development Team</p>
    </div>
  </footer>

  <!-- Item Detail Modal -->
  <div id="item-modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div id="modal-content">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get references to all relevant elements
      const homeSection = document.getElementById("home-section");
      const reportLostSection = document.getElementById("report-lost-section");
      const reportFoundSection = document.getElementById("report-found-section");
      const searchSection = document.getElementById("search-section");
      const loginSection = document.getElementById("login-section");
      
      const reportLostBtn = document.getElementById("report-lost-btn");
      const reportFoundBtn = document.getElementById("report-found-btn");
      const searchItemsBtn = document.getElementById("search-items-btn");
      
      const actionButtons = document.getElementById("action-buttons");
      const lostItems = document.getElementById("lost-items");
      
      // Function to show Lost Form and hide other sections
      function showLostForm() {
        // Show home section and lost form
        homeSection.classList.remove("hidden");
        reportLostSection.classList.remove("hidden");
        
        // Hide action buttons and items listings
        actionButtons.classList.add("hidden");
        lostItems.classList.add("hidden");
        
        // Hide found form and search section
        reportFoundSection.classList.add("hidden");
        searchSection.classList.add("hidden");
        loginSection.classList.add("hidden");
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
      
      // Function to show Found Form and hide other sections
      function showFoundForm() {
        // Show home section and found form
        homeSection.classList.remove("hidden");
        reportFoundSection.classList.remove("hidden");
        
        // Hide action buttons and items listings
        actionButtons.classList.add("hidden");
        lostItems.classList.add("hidden");
        
        // Hide lost form and search section
        reportLostSection.classList.add("hidden");
        searchSection.classList.add("hidden");
        loginSection.classList.add("hidden");
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
      
      // Function to show Search Section and hide other sections
      function showSearchSection() {
        // Show home section and search section
        homeSection.classList.remove("hidden");
        searchSection.classList.remove("hidden");
        
        // Hide action buttons and items listings
        actionButtons.classList.add("hidden");
        lostItems.classList.add("hidden");
        
        // Hide forms
        reportLostSection.classList.add("hidden");
        reportFoundSection.classList.add("hidden");
        loginSection.classList.add("hidden");
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
      
      // Function to show Home page with all elements
      function showHome() {
        // Show home sections and items
        homeSection.classList.remove("hidden");
        actionButtons.classList.remove("hidden");
        lostItems.classList.remove("hidden");
        
        // Hide forms and search section
        reportLostSection.classList.add("hidden");
        reportFoundSection.classList.add("hidden");
        searchSection.classList.add("hidden");
        loginSection.classList.add("hidden");
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
      
      // Event listeners for buttons
      reportLostBtn.addEventListener("click", showLostForm);
      reportFoundBtn.addEventListener("click", showFoundForm);
      searchItemsBtn.addEventListener("click", showSearchSection);
      
      // Event listeners for all "Back to Home" buttons
      document.querySelectorAll(".return-home").forEach(button => {
        button.addEventListener("click", function(e) {
          e.preventDefault();
          showHome();
        });
      });
      
      // Search functionality
      const searchBtn = document.getElementById("search-btn");
      const searchInput = document.getElementById("search-input");
      const filterCategory = document.getElementById("filter-category");
      const filterStatus = document.getElementById("filter-status");
      const filterDate = document.getElementById("filter-date");
      const clearFiltersBtn = document.getElementById("clear-filters");
      const searchResults = document.getElementById("search-results");
      
      // Function to perform search and display results
      function performSearch() {
        const searchQuery = searchInput.value.trim().toLowerCase();
        const categoryFilter = filterCategory.value;
        const statusFilter = filterStatus.value;
        const dateFilter = filterDate.value;
        
        // Create the search parameters
        const searchParams = new URLSearchParams();
        if (searchQuery) searchParams.append('query', searchQuery);
        if (categoryFilter) searchParams.append('category', categoryFilter);
        if (statusFilter) searchParams.append('status', statusFilter);
        if (dateFilter) searchParams.append('date', dateFilter);
        
        // Show loading state
        searchResults.innerHTML = '<p class="text-center">Searching...</p>';
        
        // Make AJAX request to search_items.php
        fetch('search_items.php?' + searchParams.toString())
          .then(response => response.json())
          .then(data => {
            // Display the search results
            displaySearchResults(data);
          })
          .catch(error => {
            console.error('Error searching items:', error);
            searchResults.innerHTML = '<p class="text-center text-danger">Error searching items. Please try again.</p>';
          });
      }
      
      // Function to display search results
      function displaySearchResults(data) {
        if (data.length === 0) {
          searchResults.innerHTML = '<div class="no-results">No items found matching your search criteria</div>';
          return;
        }
        
        
        let resultsHTML = '';
        
        data.forEach(item => {
          const statusClass = item.status === 'lost' ? 'status-lost' : 
                             item.status === 'found' ? 'status-found' : 'status-claimed';
          
          resultsHTML += `
            <div class="search-result-item" data-id="${item.id}">
              <div class="search-result-image-container">
                <img src="${item.image || 'images/default-item.png'}" alt="${item.item_name}" class="search-result-image">
              </div>
              <div class="search-result-details">
                <h4>${item.item_name}</h4>
                <p>${item.description.substring(0, 100)}${item.description.length > 100 ? '...' : ''}</p>
                <div class="search-result-meta">
                  <span><i class="fas fa-map-marker-alt"></i> ${item.location}</span>
                  <span><i class="fas fa-calendar"></i> ${item.date}</span>
                  <span class="item-status ${statusClass}">${item.status.toUpperCase()}</span>
                </div>
                <button class="btn primary view-details-btn mt-2" data-id="${item.id}">View Details</button>
              </div>
            </div>
          `;
        });
        
        searchResults.innerHTML = resultsHTML;
        
        // Add event listeners to "View Details" buttons
        document.querySelectorAll('.view-details-btn').forEach(button => {
          button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            showItemDetails(itemId);
          });
        });
      }
      
      // Function to show item details in modal
      function showItemDetails(itemId) {
        // Make AJAX request to get item details
        fetch('get_item_details.php?id=' + itemId)
          .then(response => response.json())
          .then(item => {
            const modal = document.getElementById('item-modal');
            const modalContent = document.getElementById('modal-content');
            
            const statusClass = item.status === 'lost' ? 'status-lost' : 
                               item.status === 'found' ? 'status-found' : 'status-claimed';
            
            modalContent.innerHTML = `
              <div class="item-detail-container">
                <div class="text-center mb-4">
                  <img src="${item.image || 'images/default-item.png'}" alt="${item.item_name}" class="item-detail-image">
                </div>
                <div class="item-detail-info">
                  <h3>${item.item_name}</h3>
                  <span class="item-status ${statusClass} mb-3 d-inline-block">${item.status.toUpperCase()}</span>
                  
                  <div class="item-detail-row">
                    <strong>Category:</strong> ${item.category}
                  </div>
                  
                  <div class="item-detail-row">
                    <strong>Description:</strong> ${item.description}
                  </div>
                  
                  <div class="item-detail-row">
                    <strong>Location:</strong> ${item.location}
                  </div>
                  
                  <div class="item-detail-row">
                    <strong>Date:</strong> ${item.date}
                  </div>
                  
                  ${item.current_location ? `
                  <div class="item-detail-row">
                    <strong>Current Location:</strong> ${item.current_location}
                  </div>
                  ` : ''}
                  
                  <div class="item-detail-row">
                    <strong>Contact:</strong> ${item.contact}
                  </div>
                  
                  <div class="mt-4">
                    <button class="btn primary claim-btn" data-id="${item.id}">Claim This Item</button>
                  </div>
                </div>
              </div>
            `;
            
            // Show the modal
            modal.classList.remove('hidden');
            
            // Add event listener to the claim button
            document.querySelector('.claim-btn').addEventListener('click', function() {
              alert('To claim this item, please contact the ICT Department at ictlostfound@college.edu or call extension 4321.');
            });
          })
          .catch(error => {
            console.error('Error fetching item details:', error);
          });
      }
      
      // Event listener for search button
      searchBtn.addEventListener('click', performSearch);
      
      // Event listener for Enter key in search input
      searchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
          performSearch();
        }
      });
      
      // Event listener for clear filters button
      clearFiltersBtn.addEventListener('click', function() {
        searchInput.value = '';
        filterCategory.value = '';
        filterStatus.value = '';
        filterDate.value = '';
        searchResults.innerHTML = '<p class="text-center">Enter search terms or select filters to find items</p>';
      });
      
      // Event listener for close modal
      document.querySelector('.close-modal').addEventListener('click', function() {
        document.getElementById('item-modal').classList.add('hidden');
      });
      function goHome() {
        // Example: Hide search section and show home section
        document.getElementById('search-section').classList.add('hidden');
        document.getElementById('home-section')?.classList.remove('hidden');
    }
      
      // Close modal when clicking outside
      window.addEventListener('click', function(event) {
        const modal = document.getElementById('item-modal');
        if (event.target === modal) {
          modal.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>