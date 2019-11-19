const main = document.querySelector('#main');
const walk = 20;

function shadow(e) {
    const { offsetWidth: width, offsetHeight: height} = main;
    let {offsetX: x, offsetY: y} = e;
    if (this !== e.target) {
        x = x + e.target.offsetLeft;
        y = y + e.target.offsetTop;
    }

    const xWalk = Math.round((x / width * walk) - (walk / 2));
    const yWalk = Math.round((y / height * walk) - (walk / 2));
    main.style.textShadow = `${xWalk}px ${yWalk}px 0 black`;

    console.log(xWalk,yWalk, e.target);
    
}

main.addEventListener("mousemove", shadow);