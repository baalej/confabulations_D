/* 
if there are two elements parend and child that contain accessibility tags, 
the class "captioned" should be added on the parent
*/

let backToMenuEl;
let clockMiniature;
let miniatureHour;
let miniatureMin;
let miniatureSec;

function addCaptions() {
	let accessibleEls = document.getElementsByClassName('accessible');
	let accessibilityMsgEl = document.getElementById('accessibility-messages');
	let altEl = document.getElementById('alt');
	let ariaEl = document.getElementById('aria');

  for (let i = 0; i < accessibleEls.length; i++) {
    let alt = '';
    let aria = '';
    let parent, child;

    parent = accessibleEls[i];
    child = accessibleEls[i].firstElementChild ? accessibleEls[i].firstElementChild : null;

    if (parent.getAttribute('alt') != null) {
      alt = parent.getAttribute('alt');
    }
    if (parent.getAttribute('aria-label') != null) {
      aria = parent.getAttribute('aria-label');
    }

    if (child != null) {
      if (child.getAttribute('alt') != null) {
        alt = child.getAttribute('alt');
      }
      if (child.getAttribute('aria-label') != null) {
        aria = child.getAttribute('aria-label');
      }
    }

    accessibleEls[i].addEventListener('mouseover', () => {displayAccessibility(alt, aria)}, false);
    accessibleEls[i].addEventListener('mouseout', () => {displayAccessibility('', '')}, false);
  }
}

function displayAccessibility(altText, ariaText) {
	let accessibleEls = document.getElementsByClassName('accessible');
	let accessibilityMsgEl = document.getElementById('accessibility-messages');
	let altEl = document.getElementById('alt');
	let ariaEl = document.getElementById('aria');

  if (altText != '' || ariaText != '') {
    accessibilityMsgEl.style.display = 'block';
    altEl.innerHTML = altText;
    ariaEl.innerHTML = ariaText;
  } else {
    accessibilityMsgEl.style.display = 'none';
    altEl.innerHTML = '';
    ariaEl.innerHTML = '';
  }
}

function calcTime(offset) {
  let d = new Date();
  let utc = d.getTime() + (d.getTimezoneOffset() * 60000);
  let nd = new Date(utc + (3600000*offset));

  return nd;
}

function clockMechanism() {
	const hour = document.querySelector('#hourhand');
	const minute = document.querySelector('#minhand');
	const second = document.querySelector('#sechand');
	const clockWrapperEl = document.querySelector('#clock-wrapper');

	if (clockWrapperEl) {
	  setInterval(() => {
	    let d = calcTime('+2'); //Estonia is UTC+2
	    let hr = d.getHours();
	    let min = d.getMinutes();
	    let sec = d.getSeconds();
	    let hr_rotation = 30 * hr + min / 2; //converting current time
	    let min_rotation = 6 * min;
	    let sec_rotation = 6 * sec;

	    // at 19:05 reload the page to display the stream
	    if (hr === 19 && min === 5) {
	    	location.reload();
	    }
	  
	    hour.style.transform = `translateX(-50%) rotate(${hr_rotation}deg)`;
	    minute.style.transform = `translateX(-50%) rotate(${min_rotation}deg)`;
	    second.style.transform = `translateX(-50%) rotate(${sec_rotation}deg)`;
	  }, 1000);
	} else {
	  console.log('No clock');
	}
}

function clockScroll() {

  miniatureHour.style.transform = "translateX(-50%) rotate3d(0, 0, 1, "+(-window.pageYOffset/56)+"deg)";
	miniatureMin.style.transform = "translateX(-50%) rotate3d(0, 0, 1, "+(-window.pageYOffset/16)+"deg)";
	miniatureSec.style.transform = "translateX(-50%) rotate3d(0, 0, 1, "+(-window.pageYOffset/2)+"deg)";

  let y = window.scrollY;
  if (y >= 800) {
    backToMenuEl.style.display = "block"
  } else {
    backToMenuEl.style.display = "none"
  }
};

function debounce(method, delay) {
    clearTimeout(method._tId);
    method._tId= setTimeout(function(){
        method();
    }, delay);
}

function init() {
	// assign variables
	backToMenuEl = document.getElementById("back-to-menu");
	clockMiniature = document.getElementById("clock-miniature");
	miniatureHour = document.getElementById("miniature-hourhand");
	miniatureMin = document.getElementById("miniature-minhand");
	miniatureSec = document.getElementById("miniature-sechand");

	clockMechanism();

	if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	  window.addEventListener("scroll", function() {
	    debounce(clockScroll, 10);
	  });

	  addCaptions();
	}
}

document.addEventListener('DOMContentLoaded', init, false);