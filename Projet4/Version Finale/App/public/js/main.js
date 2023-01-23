let navButtonSmall = document.getElementsByClassName('navClickZone');
let navBlockBSmall = document.getElementsByClassName('navBlockBSmall');
let pageBlock = document.getElementById('pageBlock');
let articleOverview = document.getElementsByClassName('articleDscOverview');
let homepageOverview = document.getElementsByClassName('homepageOverview');
let sessionInfos = document.getElementsByClassName('sessionInfos');

/* Animation navigation mobile */

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

/* Affichage des aperçus des billets */

function showArticleOverview(articleContent, homepageArticleContent) {
    if (articleContent.length > 0) {
        for (let i = 0; i < articleContent.length; i++) {
            articleOverview[i].innerHTML = articleContent[i].innerHTML.substring(0, 500) + ' ...';
        }
    } else if (homepageArticleContent.length > 0) {
        for (let i = 0; i < homepageArticleContent.length; i++) {
            homepageOverview[i].innerHTML = homepageArticleContent[i].innerHTML.substring(0, 550) + ' ...';
        }
    }
}

navDisplayOrHide(navBlockBSmall[0], navButtonSmall[0], pageBlock);
showArticleOverview(articleOverview, homepageOverview);