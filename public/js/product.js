tabcontent = document.getElementsByClassName("tab-content");
for (i = 1; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
}

function changeTab(TabName, evt) {
    // Declare all variables
    var i, tabcontent, tablinks;

    console.log(TabName + 'link')

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("product__wrapper-left_item");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("product__wrapper-left_item_active", "")    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(TabName).style.display = "block";
    document.getElementById(`${TabName + 'link'}`).classList.add("product__wrapper-left_item_active");
    document.querySelector('.url__text').scrollIntoView({
        behavior: 'smooth'
      });
}