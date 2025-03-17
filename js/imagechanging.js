
    // Array of background image URLs
    const images = [
        '/image/bgimg1.png',
        'image/bgimg2.png',
        'image/bgimg4.png',
        'image/bgimg1.png',
        'image/bgimg3.png', 
        'image/bgimg4.png',
        'image/bgimg3.png',
        'image/bgimg2.png'
    ];

    let currentImageIndex = 0;
    let preloadedImages = [];

    // Preload images to avoid delay
    function preloadImages() {
        for (let i = 0; i < images.length; i++) {
            preloadedImages[i] = new Image();
            preloadedImages[i].src = images[i];
        }
    }

    // Function to change the background image
    function changeBackground() {
        document.body.style.backgroundImage = `url('${images[currentImageIndex]}')`;
        currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    // Preload images first
    preloadImages();

    // Start background change after images are preloaded
    setTimeout(() => {
        setInterval(changeBackground, 6000);
        changeBackground(); // Set the initial background image
    }, 500); // Small delay to allow preloading
