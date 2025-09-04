<?php
$frases = [
    "Cada momento ao seu lado é único 💖",
    "Nosso amor cresce a cada dia 🌹",
    "Com você, a vida é mais leve 🌟",
    "Meu coração bate no ritmo do seu 💓",
    "Minha felicidade tem nome: Você 😘"
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Memory Love</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/signo.css" rel="stylesheet">
<style>
body { background: #000; color: #fff; text-align: center; overflow-x: hidden; }
.fullscreen { position: fixed; top:0;left:0;right:0;bottom:0; background:#000; display:flex; justify-content:center; align-items:center; z-index:9999; }
.carousel-container { margin: 0 auto; width: 99%; display:none; } /* escondido até iniciar */
@media(min-width:768px){ .carousel-container{ width:80%; } }
.carousel-item img{ height:60vh; object-fit:cover; border-radius:15px; }
.carousel-caption{ background: rgba(0,0,0,0.6); padding:10px 20px; border-radius:10px; font-size:1.3rem; }
#finalMsg{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    font-size:3rem;
    color:#ff4081;
    font-weight:bold;
    animation: explode 2s ease forwards, glow 2s infinite alternate;
    z-index:2000;
    text-shadow:0 0 15px #ff4081,0 0 30px #fff;
    text-align:center;
}
/* coração batendo */
#finalMsg span{
    display:inline-block;
    animation: heartbeat 1s infinite;
}

@keyframes heartbeat {
    0%,100% { transform: scale(1); }
    25% { transform: scale(1.2); }
    50% { transform: scale(1); }
    75% { transform: scale(1.2); }
}

@keyframes explode{ 0%{ transform:translate(-50%,-50%) scale(0); opacity:0; } 50%{ transform:translate(-50%,-50%) scale(1.2); opacity:1; } 100%{ transform:translate(-50%,-50%) scale(1); opacity:1; } }
@keyframes glow{ from{ text-shadow:0 0 15px #ff4081,0 0 30px #fff; } to{ text-shadow:0 0 30px #ff80ab,0 0 60px #fff; } }
</style>
</head>
<body>

<!-- Tela inicial -->
<div id="startScreen" class="fullscreen">
  <button class="btn btn-lg btn-light" onclick="startExperience()">Iniciar</button>
</div>

<!-- Player de música -->
<div class="container mt-3">
  <audio id="bgMusic" controls>
    <source src="../sound/background.mp3" type="audio/mpeg">
    Seu navegador não suporta áudio.
  </audio>
</div>

<!-- Carrossel -->
<div id="photoCarousel" class="carousel slide carousel-container" data-bs-interval="8000">
  <div class="carousel-inner">
    <?php for($i=1;$i<=5;$i++): ?>
      <div class="carousel-item <?= $i==1?'active':'' ?>">
        <img src="../img/0<?= $i ?>.jpg" alt="foto <?= $i ?>">
        <div class="carousel-caption">
          <p><?= $frases[$i-1] ?></p>
        </div>
      </div>
    <?php endfor; ?>
  </div>
</div>

<!-- Signo Section -->
<div id="signoSection" class="signo-section" style="display:none;">
  <h2 class="signo-title">♈ Áries + Áries ♈</h2>
  <p class="signo-text">Duas almas intensas, cheias de paixão e energia. 💥</p>
  <p class="signo-text">A vida juntos nunca é monótona, cada dia é uma aventura 🚀</p>
  <p class="signo-text">Por vezes teimosos, mas sempre leais, sempre sinceros ✨</p>
  <p class="signo-text">E esse amor… é a chama que jamais se apaga ❤️‍🔥</p>
</div>

<!-- Mensagem final -->
<div id="finalMsg">Eu Te Amo minha Gatinha <span>❤️</span></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const music = document.getElementById("bgMusic");
const carouselEl = document.getElementById("photoCarousel");
const signoSection = document.getElementById("signoSection");
const finalMsg = document.getElementById("finalMsg");

let carousel; // variável do carousel

function startExperience(){
  document.getElementById("startScreen").style.display="none";
  music.play();

  // mostra e inicia o carrossel
  carouselEl.style.display="block";
  carousel = new bootstrap.Carousel(carouselEl, {
    interval: 10000,
    ride: 'carousel' // aqui ele vai começar a passar automaticamente
  });
}

// Quando terminar carrossel → mostra signo
carouselEl.addEventListener("slid.bs.carousel", function(e){
  let activeIndex = e.to;
  let totalSlides = carouselEl.querySelectorAll(".carousel-item").length;
  if(activeIndex === totalSlides-1){
    setTimeout(()=>{
      carouselEl.style.display="none";
      signoSection.style.display="block";

      // calcula tempo total do typewriter (aprox. 45s)
      setTimeout(()=>{
        signoSection.style.display="none";
        finalMsg.style.display="block";
      },20000);

    },8000);
  }
});
</script>
</body>
</html>
