/* Resize original maps without changing their forms, links or hit areas. */
(() => {
  'use strict';
  const scaleLimit=1.25;
  const waitForImage=image=>new Promise(resolve=>{const probe=new Image();probe.onload=resolve;probe.onerror=resolve;probe.src=image.src;if(probe.complete)resolve();});
  function fitSurface(surface,host,nativeWidth,nativeHeight){
    const viewport=document.createElement('div');viewport.className='original-map-viewport';
    surface.before(viewport);viewport.append(surface);surface.classList.add('original-map-surface');host.classList.add('original-map-host');
    let lastScale=0;
    const update=()=>{
      const available=Math.max(1,host.clientWidth-24);
      const scale=Math.min(scaleLimit,available/nativeWidth);
      if(Math.abs(scale-lastScale)<.001)return;
      lastScale=scale;
      surface.style.zoom=String(scale);
      viewport.style.width=(nativeWidth*scale)+'px';
      viewport.style.height=(nativeHeight*scale)+'px';
      viewport.dataset.mapScale=String(scale);
      viewport.dataset.nativeWidth=String(nativeWidth);
      viewport.dataset.nativeHeight=String(nativeHeight);
    };
    update();new ResizeObserver(update).observe(host);
  }
  async function initialize(){
    const tiled=document.querySelector('input[type=image][src*="/attackmap/"]');
    if(tiled){
      const host=tiled.closest('.box-content');
      if(host){
        let surface=tiled.closest('.attack_map')||tiled.closest('table');
        if(!surface)return;
        if(surface.tagName==='TABLE')while(surface.parentElement?.closest('table')&&host.contains(surface.parentElement.closest('table')))surface=surface.parentElement.closest('table');
        await Promise.all([...surface.querySelectorAll('input[type=image]')].map(waitForImage));
        const width=surface.offsetWidth,height=surface.offsetHeight;
        if(width&&height)fitSurface(surface,host,width,height);
      }
    }
    const imageMap=document.querySelector('img[usemap][src*="/attackmap/"]');
    if(imageMap){
      await waitForImage(imageMap);
      const host=imageMap.closest('.box-content');
      if(host){
        const surface=document.createElement('div');
        const width=imageMap.offsetWidth,height=imageMap.offsetHeight;
        surface.style.width=width+'px';surface.style.height=height+'px';
        imageMap.before(surface);surface.append(imageMap);
        fitSurface(surface,host,width,height);
      }
    }
    const town=document.querySelector('.container-tag');
    const townImage=town?.querySelector('img[src*="/town/"]');
    const hotspots=town?.querySelector('.tag');
    if(town&&townImage&&hotspots){
      await waitForImage(townImage);
      // Preserve the original hotspot-to-image offset before centering the group.
      const picture=townImage.getBoundingClientRect(),tags=hotspots.getBoundingClientRect();
      const dx=tags.left-picture.left,dy=tags.top-picture.top;
      const width=townImage.offsetWidth,height=townImage.offsetHeight;
      const surface=document.createElement('div');surface.className='original-town-surface';surface.style.width=width+'px';surface.style.height=height+'px';
      townImage.before(surface);surface.append(townImage,hotspots);hotspots.style.left=dx+'px';hotspots.style.top=dy+'px';
      fitSurface(surface,town,width,height);
    }
  }
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initialize,{once:true});else initialize();
})();
