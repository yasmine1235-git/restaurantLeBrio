class ParallaxCard {
    constructor(cardEl) {
        // Store the card element and its image wrapper
        this.cardEl = cardEl;
        this.imageWrapper = cardEl.querySelector('.card__image-wrapper');

        // Calculate the height difference between the image wrapper and the card
        this.heightDiff = this.imageWrapper.clientHeight - this.cardEl.clientHeight;
    }

    update() {
        // Get the current position of the card relative to the viewport
        const boundingRect = this.cardEl.getBoundingClientRect();
        const topOffset = boundingRect.y;

        // Calculate the progress of the card in the viewport (from top to bottom)
        const progress = topOffset / window.innerHeight;

        // Calculate the vertical offset for the parallax effect
        const offset = this.heightDiff * progress * -1;

        // Apply the transform to the image wrapper to create the parallax effect
        this.imageWrapper.style.transform = `translate(0, ${offset}px)`;
    }
}

function initCardParallax() {
    // Select all card elements
    const cardEls = document.querySelectorAll('.card');

    // Create a ParallaxCard instance for each card element
    const cards = Array.from(cardEls).map((cardEl) => new ParallaxCard(cardEl));

    // Update function to update the parallax effect for each card
    function update() {
        cards.forEach((card) => card.update());
    }

    // Request the browser to call the update function on the next animation frame
    function onScroll() {
        requestAnimationFrame(update);
    }

    // Attach the onScroll function to the scroll event
    window.addEventListener('scroll', onScroll);

    // Initial call to update the parallax effect
    requestAnimationFrame(update);
}

// Ensure the initCardParallax function runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initCardParallax);
