<?php

/**
 * Home Controller
 * 
 * Handles requests for the main landing page
 */
class HomeController
{
    /**
     * Display the home page
     *
     * @return void
     */
    public function index()
    {
        // Load the ContentModel
        require_once APP_DIR . '/models/ContentModel.php';

        // Get all section data from the model
        $heroData = ContentModel::getHeroData();
        $aboutData = ContentModel::getAboutData();
        $servicesData = ContentModel::getServicesData();
        $portfolioData = ContentModel::getPortfolioData();
        $clientData = ContentModel::getClientsData();
        $faqData = ContentModel::getFaqData();
        $footerData = ContentModel::getFooterData();

        // Combine all data
        $viewData = [
            'hero' => $heroData,
            'about' => $aboutData,
            'services' => $servicesData,
            'portfolio' => $portfolioData,
            'clients' => $clientData,
            'faq' => $faqData,
            'footer' => $footerData
        ];

        // Render the home page view
        view('home', $viewData);
    }
}
