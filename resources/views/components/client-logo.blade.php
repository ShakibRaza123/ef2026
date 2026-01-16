<div class="bg-[#f58220] overflow-hidden py-10">
    <div id="logoViewport" class="overflow-hidden w-full">
        <div id="logoTrack" class="flex gap-12 items-center w-max will-change-transform"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const totalLogos = 22;
    const base =
        'https://pub-d0247e56e5b842aa9e58b7d4adb01047.r2.dev/logo/';

    const track = document.getElementById('logoTrack');
    if (!track) return;

    track.innerHTML = Array.from({ length: totalLogos }, (_, i) => `
        <img src="${base}logo${i + 1}.png"
             class="h-20 shrink-0 brightness-0 invert">
    `).join('');
});
</script>
