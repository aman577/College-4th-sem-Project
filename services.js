// Sub-services for each category
const servicesData = {
  "hair-care": [
    {
      name: "Haircut",
      description: "A professional haircut tailored to your style.",
      price: "Rs. 200",
      image: "./IMAGES/brand-7.png",
    },
    {
      name: "Hair Spa",
      description: "Relax and rejuvenate your scalp with our hair spa.",
      price: "Rs. 500",
      image: "./IMAGES/brand-8.png",
    },
    {
      name: "Hair Coloring",
      description: "Premium coloring services with top-quality products.",
      price: "Rs. 700",
      image: "./IMAGES/brand-9.png",
    },
  ],
  "facial-care": [
    {
      name: "Basic Facial",
      description: "A basic facial for clean and glowing skin.",
      price: "Rs. 300",
      image: "./IMAGES/PAGE8/salon_02.jpg",
    },
    {
      name: "Anti-aging Facial",
      description:
        "Reduce wrinkles and fine lines with this anti-aging treatment.",
      price: "Rs. 800",
      image: "./IMAGES/page11/page 112nd.jpg",
    },
  ],
  "nail-care": [
    {
      name: "Manicure",
      description: "Nail care, trimming, and polishing.",
      price: "Rs. 250",
      image: "images/manicure.jpg",
    },
    {
      name: "Pedicure",
      description: "Foot care, including nail trimming and exfoliation.",
      price: "Rs. 350",
      image: "images/pedicure.jpg",
    },
  ],
  "skin-care": [
    {
      name: "Deep Cleansing",
      description: "Deep cleansing for refreshed skin.",
      price: "Rs. 400",
      image: "images/deepcleansing.jpg",
    },
    {
      name: "Anti-acne Treatment",
      description: "Reduce acne with our specialized treatment.",
      price: "Rs. 600",
      image: "images/antiacne.jpg",
    },
  ],
  massage: [
    {
      name: "Full Body Massage",
      description: "Relax with a full body massage to ease muscle tension.",
      price: "Rs. 600",
      image: "images/fullbodymassage.jpg",
    },
    {
      name: "Head Massage",
      description: "A soothing head massage to relieve stress.",
      price: "Rs. 25",
      image: "images/headmassage.jpg",
    },
  ],
  "bridal-services": [
    {
      name: "Bridal Hair Styling",
      description: "Elegant hair styling for brides.",
      price: "Rs. 1500",
      image: "images/bridalhair.jpg",
    },
    {
      name: "Bridal Makeup",
      description: "Flawless makeup for the perfect wedding day look.",
      price: "Rs. 20000",
      image: "images/bridalmakeup.jpg",
    },
  ],
};

// Function to display sub-services when category is clicked
document.querySelectorAll(".category").forEach((category) => {
  category.addEventListener("click", function () {
    const categoryKey = category.getAttribute("data-category");
    const subServiceList = document.getElementById("sub-service-list");
    subServiceList.innerHTML = ""; // Clear previous list

    // Populate sub-services
    servicesData[categoryKey].forEach((subService) => {
      const listItem = document.createElement("li");
      listItem.classList.add("sub-service");
      listItem.innerText = subService.name;
      listItem.addEventListener("mouseenter", function () {
        showDetails(subService);
      });
      subServiceList.appendChild(listItem);
    });
  });
});

// Function to update the details section with the selected sub-service information
function showDetails(subService) {
  document.getElementById("service-name").innerText = subService.name;
  document.getElementById("service-description").innerText =
    subService.description;
  document.getElementById(
    "service-price"
  ).innerText = `Price: ${subService.price}`;
  document.querySelector(
    ".service-details"
  ).style.backgroundImage = `url(${subService.image})`;
}

// Book Appointment Function
function bookAppointment() {
  alert("Your appointment has been booked!");
}
