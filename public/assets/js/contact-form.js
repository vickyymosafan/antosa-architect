/**
 * Contact Form Handler
 * 
 * Handles form submission with AJAX and provides user feedback
 */

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form-element');
    
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitButton = contactForm.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.innerHTML;
        
        // Show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
        
        // Clear previous error messages
        clearErrorMessages();
        
        // Get form data
        const formData = new FormData(contactForm);
        
        // Send AJAX request
        fetch(contactForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showSuccessMessage(data.message);
                contactForm.reset();
            } else {
                showErrorMessages(data.errors || [data.message]);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorMessages(['Terjadi kesalahan. Silakan coba lagi.']);
        })
        .finally(() => {
            // Restore button state
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
        });
    });
    
    /**
     * Show success message
     */
    function showSuccessMessage(message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'bg-green-500/20 border border-green-500/30 text-green-300 px-4 py-3 rounded-lg mb-4 flex items-center';
        alertDiv.innerHTML = `
            <i class="fas fa-check-circle mr-3"></i>
            <span>${message}</span>
        `;
        
        contactForm.insertBefore(alertDiv, contactForm.firstChild);
        
        // Remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
        
        // Scroll to form
        contactForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    /**
     * Show error messages
     */
    function showErrorMessages(errors) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'bg-red-500/20 border border-red-500/30 text-red-300 px-4 py-3 rounded-lg mb-4';
        
        let errorHtml = '<i class="fas fa-exclamation-triangle mr-3"></i>';
        if (Array.isArray(errors)) {
            errorHtml += '<ul class="list-disc list-inside">';
            errors.forEach(error => {
                errorHtml += `<li>${error}</li>`;
            });
            errorHtml += '</ul>';
        } else {
            errorHtml += `<span>${errors}</span>`;
        }
        
        alertDiv.innerHTML = errorHtml;
        contactForm.insertBefore(alertDiv, contactForm.firstChild);
        
        // Remove after 8 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 8000);
        
        // Scroll to form
        contactForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    /**
     * Clear previous error/success messages
     */
    function clearErrorMessages() {
        const existingAlerts = contactForm.querySelectorAll('.bg-green-500\\/20, .bg-red-500\\/20');
        existingAlerts.forEach(alert => alert.remove());
    }
});

/**
 * Newsletter Subscription Handler
 */
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForms = document.querySelectorAll('[data-newsletter-form]');
    
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitButton = form.querySelector('button[type="submit"]');
            const emailInput = form.querySelector('input[type="email"]');
            const originalButtonText = submitButton.innerHTML;
            
            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            // Get form data
            const formData = new FormData();
            formData.append('email', emailInput.value);
            
            // Send AJAX request
            fetch('/api/subscribe-newsletter', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNewsletterMessage(form, data.message, 'success');
                    form.reset();
                } else {
                    showNewsletterMessage(form, data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNewsletterMessage(form, 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            })
            .finally(() => {
                // Restore button state
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            });
        });
    });
    
    /**
     * Show newsletter subscription message
     */
    function showNewsletterMessage(form, message, type) {
        const existingMessage = form.querySelector('.newsletter-message');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `newsletter-message mt-3 px-3 py-2 rounded-lg text-sm ${
            type === 'success' 
                ? 'bg-green-500/20 border border-green-500/30 text-green-300' 
                : 'bg-red-500/20 border border-red-500/30 text-red-300'
        }`;
        messageDiv.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check' : 'exclamation-triangle'} mr-2"></i>
            ${message}
        `;
        
        form.appendChild(messageDiv);
        
        // Remove after 5 seconds
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
});

/**
 * Dynamic Content Loading
 */
class ContentLoader {
    static async loadSectionData(section) {
        try {
            const response = await fetch(`/api/${section}-data`);
            const data = await response.json();
            
            if (data.success) {
                return data.data;
            } else {
                throw new Error(data.message || 'Failed to load data');
            }
        } catch (error) {
            console.error(`Error loading ${section} data:`, error);
            return null;
        }
    }
    
    static async loadStats() {
        try {
            const response = await fetch('/api/stats');
            const data = await response.json();
            
            if (data.success) {
                return data.data;
            } else {
                throw new Error(data.message || 'Failed to load stats');
            }
        } catch (error) {
            console.error('Error loading stats:', error);
            return null;
        }
    }
}

// Export for use in other scripts
window.ContentLoader = ContentLoader;
