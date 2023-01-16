// klik effect
const burst = new mojs.Burst({
  left: 0, top: 0,
  radius:   { 4: 32 },
  angle:    45,
  count:    14,
  children: {
    radius:       2.5,
    fill:         '#fff',
    scale:        { 2: 0, easing: 'quad.in' },
    pathScale:    [ .8, null ],
    degreeShift:  [ 13, null ],
    duration:     [ 500, 700 ],
    easing:       'quint.out'
  }
});
let buttonHome = document.querySelector('.bedank')
buttonHome.addEventListener( 'click', function (e) {
  const coords = { x: e.pageX, y: e.pageY };
  burst
    .tune(coords)
    .replay();
});

// wrap every letter in a span
var textWrapper = document.querySelector('.text-bedank .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.text-bedank .letter',
    translateY: ["1.2em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
    })
  .add({
    targets: '.text-bedank',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 700
  });