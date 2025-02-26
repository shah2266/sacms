const root = document.documentElement;
const imageUrls = [
    '../images/auth/login_bg1.jpg',
    '../images/auth/login_bg2.jpg',
];
let index = 0;

function changeBackgroundImage() {
    root.style.setProperty('--background-images', `url('${imageUrls[index]}')`);
    index = (index + 1) % imageUrls.length;
}

function updateBackgroundImage() {
    // Set an initial background image
    changeBackgroundImage();

    setInterval(() => {
        changeBackgroundImage();
    }, 5000); // 5 seconds interval
}

// Initial setup
updateBackgroundImage();
