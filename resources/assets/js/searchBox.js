function searchBox (inputElement, listElement) {
  // Declare variables

  var input, filter, ul, li, x, i;
  input = document.getElementById(inputElement);
  filter = input.value.toUpperCase();
  ul = document.getElementById(listElement);
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 1; i < li.length; i++) {
    x = li[i].getElementsByTagName('input')[0];
    if (x.value.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = '';
    } else {
      li[i].style.display = 'none';
    }
  }
}
