/*
 ** @author: Alisha Garric
 ** @description: Adds masonry to memberships
 */


function initMasonry() {
  
    var elem = document.querySelector('.membership-listings-inner');
    if ( elem ){

        var msnry = new Masonry( elem, {
            columnWidth: '.grid-sizer',
            itemSelector: '.membership-listing-card',
            percentPosition: true
        });
    }
}
  
initMasonry();