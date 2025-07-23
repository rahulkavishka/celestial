document.addEventListener("DOMContentLoaded", function () {
    const images = [
        "Images/Products/SecondImg.png",
        "Images/Products/ThirdImg.png",
        "Images/Products/FourthImg.png",
        "Images/Products/FifthImg.png",
        "Images/Products/SixthImg.png",
        "Images/Products/SeventhImg.png",
        "Images/Products/EighthImg.png"
    ];

    let currentIndex = 0;
    const imgElement = document.querySelector(".firstImg img");
    imgElement.style.transition = "opacity 1s ease-in-out";

    function changeImage() {
        imgElement.style.opacity = 0;
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % images.length;
            imgElement.src = images[currentIndex];
            imgElement.style.opacity = 1;
        }, 800);
    }

    setInterval(changeImage, 3000);
});
