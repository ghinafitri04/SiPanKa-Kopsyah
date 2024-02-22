function updateStep(step) {
    const circles = document.querySelectorAll('.step-circle');
    const lines = document.querySelectorAll('.step-line');

    circles.forEach((circle, index) => {
        if (index < step) {
            circle.classList.add('active');
        } else {
            circle.classList.remove('active');
        }
    });

    lines.forEach((line, index) => {
        line.style.backgroundColor = index < step - 1 ? '#00BCD4' : '#ccc';
    });
}