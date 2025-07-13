<?php

/**
 * API Controller
 * 
 * Handles API requests for dynamic content and form submissions
 */
class ApiController
{
    /**
     * Handle contact form submission
     * 
     * @return void
     */
    public function sendInquiry()
    {
        // Set JSON response header
        header('Content-Type: application/json');
        
        // Check if request method is POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Method not allowed'
            ]);
            return;
        }
        
        // Validate and sanitize input data
        $name = $this->sanitizeInput($_POST['name'] ?? '');
        $email = $this->sanitizeInput($_POST['email'] ?? '');
        $phone = $this->sanitizeInput($_POST['phone'] ?? '');
        $message = $this->sanitizeInput($_POST['message'] ?? '');
        
        // Validation
        $errors = [];
        
        if (empty($name)) {
            $errors[] = 'Nama lengkap wajib diisi';
        }
        
        if (empty($email)) {
            $errors[] = 'Email wajib diisi';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format email tidak valid';
        }
        
        if (empty($message)) {
            $errors[] = 'Pesan wajib diisi';
        }
        
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $errors
            ]);
            return;
        }
        
        // Process the inquiry (in a real application, you would save to database or send email)
        $inquiryData = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        // For now, we'll just log it (in production, implement proper email sending)
        $this->logInquiry($inquiryData);
        
        // Send success response
        echo json_encode([
            'success' => true,
            'message' => 'Terima kasih! Pesan Anda telah diterima. Tim kami akan menghubungi Anda segera.'
        ]);
    }
    
    /**
     * Get hero section data via API
     * 
     * @return void
     */
    public function getHeroData()
    {
        header('Content-Type: application/json');
        
        require_once APP_DIR . '/models/ContentModel.php';
        $data = ContentModel::getHeroData();
        
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }
    
    /**
     * Get services data via API
     * 
     * @return void
     */
    public function getServicesData()
    {
        header('Content-Type: application/json');
        
        require_once APP_DIR . '/models/ContentModel.php';
        $data = ContentModel::getServicesData();
        
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }
    
    /**
     * Get portfolio data via API
     * 
     * @return void
     */
    public function getPortfolioData()
    {
        header('Content-Type: application/json');
        
        require_once APP_DIR . '/models/ContentModel.php';
        $data = ContentModel::getPortfolioData();
        
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }
    
    /**
     * Get about data via API
     * 
     * @return void
     */
    public function getAboutData()
    {
        header('Content-Type: application/json');
        
        require_once APP_DIR . '/models/ContentModel.php';
        $data = ContentModel::getAboutData();
        
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }
    
    /**
     * Sanitize input data
     * 
     * @param string $data
     * @return string
     */
    private function sanitizeInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
    
    /**
     * Log inquiry data (in production, implement proper logging or database storage)
     * 
     * @param array $data
     * @return void
     */
    private function logInquiry($data)
    {
        $logFile = ROOT_DIR . '/storage/inquiries.log';
        
        // Create storage directory if it doesn't exist
        $storageDir = dirname($logFile);
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }
        
        $logEntry = date('Y-m-d H:i:s') . ' - ' . json_encode($data) . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    /**
     * Handle newsletter subscription
     * 
     * @return void
     */
    public function subscribeNewsletter()
    {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Method not allowed'
            ]);
            return;
        }
        
        $email = $this->sanitizeInput($_POST['email'] ?? '');
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Email tidak valid'
            ]);
            return;
        }
        
        // Process newsletter subscription
        $subscriptionData = [
            'email' => $email,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        $this->logSubscription($subscriptionData);
        
        echo json_encode([
            'success' => true,
            'message' => 'Terima kasih! Anda telah berlangganan newsletter kami.'
        ]);
    }
    
    /**
     * Log newsletter subscription
     * 
     * @param array $data
     * @return void
     */
    private function logSubscription($data)
    {
        $logFile = ROOT_DIR . '/storage/subscriptions.log';
        
        $storageDir = dirname($logFile);
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }
        
        $logEntry = date('Y-m-d H:i:s') . ' - ' . json_encode($data) . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    /**
     * Get site statistics
     * 
     * @return void
     */
    public function getStats()
    {
        header('Content-Type: application/json');
        
        // In a real application, these would come from a database
        $stats = [
            'projects_completed' => 150,
            'happy_clients' => 98,
            'years_experience' => 10,
            'team_members' => 15,
            'awards_won' => 8
        ];
        
        echo json_encode([
            'success' => true,
            'data' => $stats
        ]);
    }
}
