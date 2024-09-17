function updateClock() {
    const currentTimeElement = document.getElementById('currentTime');

    const currentTime = new Date();
    const currentTimeString = currentTime.toLocaleTimeString();

    currentTimeElement.textContent = `${currentTimeString}`;
}
// Run the clock update when the page loads
window.addEventListener("load", () => {
    updateClock();
    // Update time every second (1000 milliseconds)
    setInterval(updateClock, 1000);
});
