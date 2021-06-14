var navButtonSmall = document.getElementsByClassName('navClickZone');
var navBlockBSmall = document.getElementsByClassName('navBlockBSmall');
var pageBlock = document.getElementById('pageBlock');

function navDisplayOrHide(navBlock, navButton, pageBlock) {
    navBlock.classList.remove('navDisplay');
    navButton.addEventListener('click', function() {
        if (navBlock.classList.contains('navHide')) {
            navBlock.classList.remove('navHide');
            pageBlock.classList.add('navOpen');
        } else {
            navBlock.classList.add('navHide');
            pageBlock.classList.remove('navOpen');
        }
    });
}

navDisplayOrHide(navBlockBSmall[0], navButtonSmall[0], pageBlock);