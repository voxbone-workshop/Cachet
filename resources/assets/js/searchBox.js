function searchBox (inputElement, listElement) {
  let input, filter, ul, li, x, i;
  input = document.getElementById(inputElement);
  filter = input.value.toUpperCase();
  ul = document.getElementById(listElement);
  li = ul.getElementsByTagName('li');

  for (i = 1; i < li.length; i++) {
    x = li[i].getElementsByTagName('input')[0];
    if (x.value.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = '';
    } else {
      li[i].style.display = 'none';
    }
  }
}
