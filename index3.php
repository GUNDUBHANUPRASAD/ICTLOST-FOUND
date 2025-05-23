<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT Department Lost & Found Portal</title>
    <style>
        .hidden {
  display: none !important;
}

        :root {
            --primary-color: #0d4b75;
            --secondary-color: #1976d2;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --light-color: #f5f5f5;
            --dark-color: #333;
            --border-radius: 6px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, var(--primary-color), #2980b9);
            color: #333;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .admin-login-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 15px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .admin-login-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .hero-card {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .hero-card h1 {
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .hero-card p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 20px;
        }

        .notification {
            background-color: rgba(255, 193, 7, 0.1);
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 15px 0;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
        }

        .notification i {
            color: #ffc107;
            margin-right: 10px;
            font-size: 20px;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            gap: 10px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn i {
            font-size: 18px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .section-title i {
            font-size: 24px;
            color: var(--danger-color);
        }

        .section-title.found i {
            color: var(--success-color);
        }

        .item-card {
            display: flex;
            gap: 20px;
            border: 1px solid #eee;
            border-radius: var(--border-radius);
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }

        .item-image {
            width: 120px;
            height: 120px;
            border-radius: var(--border-radius);
            background-color: #eee;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-details h4 {
            margin-top: 0;
            color: var(--primary-color);
        }

        .item-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            font-size: 0.9rem;
            color: #666;
        }

        .item-meta .meta-item {
            display: flex;
            gap: 5px;
        }

        .item-meta .meta-label {
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
        }

        .badge-found {
            background-color: var(--success-color);
        }

        .footer {
            text-align: center;
            color: white;
            padding: 20px 0;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
            margin-top: 20px;
        }

        .footer a {
            color: white;
            text-decoration: underline;
        }

        /* Forms */
        .form {
            display: none;
        }

        .form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
        }

        textarea.form-control {
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0a3d62;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 400px;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #777;
        }

        .admin-login-form {
            margin-top: 20px;
        }

        .file-upload {
            border: 2px dashed #ddd;
            padding: 20px;
            text-align: center;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .file-upload:hover {
            border-color: var(--secondary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .buttons-container {
                flex-direction: column;
                gap: 10px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            
            .item-card {
                flex-direction: column;
            }
            
            .item-image {
                width: 100%;
                height: 180px;
            }
            
            .item-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="color: white;">ICT Department Lost & Found Portal </h2>
            <button id="adminLoginBtn" class="admin-login-btn">Admin Login</button>
        </div>
        
        <div class="card hero-card">
            <h1><i class="fas fa-search-location"></i> Misplaced Your Device?</h1>
            <p>We're here to help! Report a lost gadget or check for found items from the ICT department.</p>
            
            <div class="notification">
                <i class="fas fa-info-circle"></i>
                <div>USB Drive found in Lab 1 — reported 2 hours ago</div>
            </div>
            
            <div class="buttons-container">
                <button id="reportLostBtn" class="btn btn-primary">
                    <i class="fas fa-exclamation-circle"></i> Report Lost Item
                </button>
                <button id="reportFoundBtn" class="btn btn-success">
                    <i class="fas fa-check-circle"></i> Report Found Item
                </button>
            </div>
        </div>
        
        <!-- Lost Item Form -->
        <div id="lostItemForm" class="card form">
            <h2><i class="fas fa-exclamation-circle"></i> Report a Lost Item</h2>
            <p>Please provide as much detail as possible to help us locate your item.</p>
            
            <form>
            <form action="submit_lost_item.php" method="POST" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group">
                        <label for="lostItemName">Item Description</label>
                        <input type="text" id="lostItemName" class="form-control" placeholder="e.g. Logitech Wireless Mouse">
                    </div>
                    <div class="form-group">
                        <label for="lostItemColor">Color</label>
                        <input type="text" id="lostItemColor" class="form-control" placeholder="e.g. Black with blue accents">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="lostItemSerial">Unique Identifiers or Serial Number</label>
                        <input type="text" id="lostItemSerial" class="form-control" placeholder="e.g. SN: 12345-ABC or any distinguishing marks">
                    </div>
                    <div class="form-group">
                        <label for="lostItemDate">Date Lost</label>
                        <input type="date" id="lostItemDate" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lostItemLocation">Last Known Location</label>
                    <input type="text" id="lostItemLocation" class="form-control" placeholder="e.g. Computer Lab 3, 2nd Floor">
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="lostItemOwnerName">Owner's Name</label>
                        <input type="text" id="lostItemOwnerName" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="lostItemOwnerEmail">Owner's Email</label>
                        <input type="email" id="lostItemOwnerEmail" class="form-control" placeholder="email@example.com">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lostItemNotes">Additional Details / Notes</label>
                    <textarea id="lostItemNotes" class="form-control" placeholder="Any additional information that might help identify your item..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="lostItemImage">Upload Picture of Item (if available)</label>
                    <div class="file-upload">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: #ccc; margin-bottom: 10px;"></i>
                        <p>Click to upload or drag and drop</p>
                        <input type="file" id="lostItemImage" style="display: none;">
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="lostItemDeclaration">
                    <label for="lostItemDeclaration">I declare that all information provided is accurate to the best of my knowledge.</label>
                </div>
                
                <button type="submit" class="btn-submit">Submit Report</button>
            </form>
        </div>
        
        <!-- Found Item Form -->
        <div id="foundItemForm" class="card form">
            <h2><i class="fas fa-check-circle"></i> Report a Found Item</h2>
            <p>Thank you for finding and reporting an item. Please provide details to help us return it to its owner.</p>
            
            <form>
                <form action="submit_found_item.php" method="POST" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group">
                        <label for="foundItemName">Item Description</label>
                        <input type="text" id="foundItemName" class="form-control" placeholder="e.g. Logitech Wireless Mouse">
                    </div>
                    <div class="form-group">
                        <label for="foundItemColor">Color</label>
                        <input type="text" id="foundItemColor" class="form-control" placeholder="e.g. Black with blue accents">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="foundItemSerial">Unique Identifiers or Serial Number (if visible)</label>
                        <input type="text" id="foundItemSerial" class="form-control" placeholder="e.g. SN: 12345-ABC or any distinguishing marks">
                    </div>
                    <div class="form-group">
                        <label for="foundItemDate">Date Found</label>
                        <input type="date" id="foundItemDate" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="foundItemLocation">Location Where Found</label>
                    <input type="text" id="foundItemLocation" class="form-control" placeholder="e.g. Computer Lab 3, 2nd Floor">
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="foundItemFinderName">Finder's Name</label>
                        <input type="text" id="foundItemFinderName" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="foundItemFinderEmail">Finder's Email</label>
                        <input type="email" id="foundItemFinderEmail" class="form-control" placeholder="email@example.com">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="foundItemNotes">Additional Details / Notes</label>
                    <textarea id="foundItemNotes" class="form-control" placeholder="Any additional information about the item or where it was found..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="foundItemImage">Upload Picture of Item</label>
                    <div class="file-upload">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: #ccc; margin-bottom: 10px;"></i>
                        <p>Click to upload or drag and drop</p>
                        <input type="file" id="foundItemImage" style="display: none;">
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="foundItemDeclaration">
                    <label for="foundItemDeclaration">I declare that all information provided is accurate and I am turning in this item to be returned to its rightful owner.</label>
                </div>
                
                <button type="submit" class="btn-submit">Submit Report</button>
            </form>
        </div>
        
        <!-- Lost Items Section -->
        <div class="card">
            <div class="section-title">
                <i class="fas fa-exclamation-circle"></i>
                <h2>Recently Lost Items</h2>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <img src="/api/placeholder/120/120" alt="Wireless Mouse">
                </div>
                <div class="item-details">
                    <h4>Wireless Mouse</h4>
                    <div class="item-meta">
                        <div class="meta-item">
                            <span class="meta-label">Category:</span>
                            <span>Computer Accessory</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Color:</span>
                            <span>Black</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Last Seen:</span>
                            <span>Computer Lab 2</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Date:</span>
                            <span>May 15, 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recently Found Items Section -->
        <div class="card">
            <div class="section-title found">
                <i class="fas fa-check-circle"></i>
                <h2>Recently Found Items</h2>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <img src="/api/placeholder/120/120" alt="Wireless Mouse">
                </div>
                <div class="item-details">
                    <h4>Wireless Mouse <span class="badge badge-found">Found</span></h4>
                    <div class="item-meta">
                        <div class="meta-item">
                            <span class="meta-label">Category:</span>
                            <span>accessory</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Found At:</span>
                            <span>Computer Lab 1</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Date:</span>
                            <span>May 17, 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Admin Login Modal -->
        <div id="adminLoginModal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h2>Admin Login</h2>
                <p>Please enter your administrator credentials to access the dashboard.</p>
                
                <form class="admin-login-form">
                    <div class="form-group">
                        <label for="adminUsername">Username</label>
                        <input type="text" id="adminUsername" class="form-control" placeholder="Admin Username">
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" id="adminPassword" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn-submit">Login</button>
                </form>
            </div>
        </div>
        
        <div class="footer">
            <p>© 2025 ICT Department Lost & Found Portal</p>
            <p>For support or inquiries, contact us at <a href="mailto:ictlostfound@college.edu">ictlostfound@college.edu</a> or call extension 4321.</p>
            <p>Powered by the ICT Student Services & Web Development Team</p>
        </div>
    </div>
    
    <script>
        // Show/hide forms
        const reportLostBtn = document.getElementById('reportLostBtn');
        const reportFoundBtn = document.getElementById('reportFoundBtn');
        const lostItemForm = document.getElementById('lostItemForm');
        const foundItemForm = document.getElementById('foundItemForm');
        
        reportLostBtn.addEventListener('click', function() {
            lostItemForm.classList.add('active');
            foundItemForm.classList.remove('active');
            window.scrollTo({
                top: lostItemForm.offsetTop - 20,
                behavior: 'smooth'
            });
        });
        
        reportFoundBtn.addEventListener('click', function() {
            foundItemForm.classList.add('active');
            lostItemForm.classList.remove('active');
            window.scrollTo({
                top: foundItemForm.offsetTop - 20,
                behavior: 'smooth'
            });
        });
        
        // Admin login modal
        const adminLoginBtn = document.getElementById('adminLoginBtn');
        const adminLoginModal = document.getElementById('adminLoginModal');
        const closeModal = document.querySelector('.close-modal');
        
        adminLoginBtn.addEventListener('click', function() {
            adminLoginModal.classList.add('active');
        });
        
        closeModal.addEventListener('click', function() {
            adminLoginModal.classList.remove('active');
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === adminLoginModal) {
                adminLoginModal.classList.remove('active');
            }
        });
        
        // File upload functionality
        const fileUploads = document.querySelectorAll('.file-upload');
        
        fileUploads.forEach(upload => {
            upload.addEventListener('click', function() {
                this.querySelector('input[type="file"]').click();
            });
            
            const input = upload.querySelector('input[type="file"]');
            input.addEventListener('change', function() {
                if (this.files.length > 0) {
                    const fileName = this.files[0].name;
                    upload.querySelector('p').textContent = `Selected: ${fileName}`;
                }
            });
        });
        
        // Form submission
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Form submitted successfully.');
                // In a real application, you would submit the form data to a server here
            });
        });
    </script>
</body>
</html>