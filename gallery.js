// Data structure to hold the images and details for each category
const galleryData = {
    "hair-care": [
      { title: "Haircut", description: "Professional haircut tailored to your style.", image: "./1stimg.jpg" },
      { title: "Hair Spa", description: "Relaxing hair spa treatment for healthy hair.", image: "./bg-03.jpg" },
      { title: "Hair Styling", description: "Stylish hairdos for all occasions.", image: "images/haircare3.jpg" }
    ],
    "skin-care": [
      { title: "Facial", description: "Refreshing facial treatment for glowing skin.", image: "./IMAGES/GALLERY/woman_01.jpg" },
      { title: "Anti-aging", description: "Anti-aging treatments to rejuvenate your skin.", image: "./IMAGES/GALLERY/woman_02.jpg" },
      { title: "Hydrating Facial", description: "Hydrating facial for deep skin hydration.", image: "./IMAGES/GALLERY/woman_03.jpg" }
    ],
    "massage": [
      { title: "Full Body Massage", description: "Complete body massage for relaxation.", image: "./IMAGES/GALLERY/woman_04.jpg" },
      { title: "Head Massage", description: "Stress-relieving head massage.", image: "./IMAGES/GALLERY/woman_02.jpg" },
      { title: "Foot Massage", description: "Relaxing foot massage to relieve tension.", image: "./IMAGES/GALLERY/woman_05.jpg" }
    ],
    "facial-care": [
      { title: "Deep Cleanse", description: "Deep cleansing for smoother skin.", image: "./IMAGES/GALLERY/woman_03.jpg" },
      { title: "Acne Treatment", description: "Effective acne treatment for clear skin.", image: "./IMAGES/GALLERY/woman_02.jpg" },
      { title: "Brightening Facial", description: "Facial to brighten and refresh the skin.", image: "./IMAGES/GALLERY/woman_04.jpg" }
    ],
    "nail-care": [
      { title: "Manicure", description: "Perfect manicure for beautiful nails.", image: "./IMAGES/GALLERY/woman_03.jpg" },
      { title: "Pedicure", description: "Relaxing pedicure for your feet.", image: "./IMAGES/GALLERY/woman_04.jpg" },
      { title: "Nail Art", description: "Creative nail art for unique designs.", image: "./IMAGES/PAGE8/salon_03.jpg" }
    ],
    "bridal-services": [
      { title: "Bridal Hair Styling", description: "Elegant bridal hairstyles for your big day.", image: "./IMAGES/GALLERY/woman_06.jpg" },
      { title: "Bridal Makeup", description: "Flawless bridal makeup to enhance your beauty.", image: "./IMAGES/GALLERY/woman_05.jpg" },
      { title: "Bridal Package", description: "Complete bridal services for your wedding.", image: "./IMAGES/GALLERY/woman_02.jpg" }
    ]
  };
  
  // Variables for dynamic content
  let currentCategory = "hair-care";  // Default category
  let currentIndex = 0;  // Default index of the image
  
  // Function to change category
  const categoryButtons = document.querySelectorAll('.category-btn');
  categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
      currentCategory = button.dataset.category;
      currentIndex = 0;  // Reset to first image of selected category
      updateGallery();
    });
  });
  
  // Function to update gallery images and details
  function updateGallery() {
    const categoryData = galleryData[currentCategory];
    const carouselImages = document.querySelector('.carousel-images');
    const detailsImage = document.getElementById("details-image");
    const detailsTitle = document.getElementById("image-title");
    const detailsDescription = document.getElementById("image-description");
  
    // Clear the carousel and add new images
    carouselImages.innerHTML = '';
    categoryData.forEach((item, index) => {
      const imgElement = document.createElement('img');
      imgElement.src = item.image;
      imgElement.alt = item.title;
      imgElement.style.display = index === currentIndex ? 'block' : 'none';
      carouselImages.appendChild(imgElement);
    });
  
    // Update the details section
    detailsImage.src = categoryData[currentIndex].image;
    detailsTitle.innerText = categoryData[currentIndex].title;
    detailsDescription.innerText = categoryData[currentIndex].description;
  }
  
  // Function to handle next and previous buttons
  document.getElementById("next").addEventListener('click', () => {
    const categoryData = galleryData[currentCategory];
    currentIndex = (currentIndex + 1) % categoryData.length;
    updateGallery();
  });
  
  document.getElementById("prev").addEventListener('click', () => {
    const categoryData = galleryData[currentCategory];
    currentIndex = (currentIndex - 1 + categoryData.length) % categoryData.length;
    updateGallery();
  });
  
  // Initial gallery load
  updateGallery();
  