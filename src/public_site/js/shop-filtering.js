let categoriesToShow = [];

/*
  This is a dirty function which uses a lot of loops to determine which products to show.
  We're looping through all the products with a given category id and saving them,
  and then we're looping through all the products and determining if we should display
  the product or not.
*/
const applyCategory = (e) => {
  const categoryId = e.target.id.replace("category-", "");
  const categoryIsChecked = e.target.checked;

  if (categoryIsChecked) {
    categoriesToShow.push(categoryId);
  } else {
    const index = categoriesToShow.indexOf(categoryId);
    if (index !== -1) {
      categoriesToShow.splice(index, 1);
    }
  }

  const amountOfProductsShownElement = document.getElementById("amount-of-shown-products");

  const allProducts = document.getElementsByClassName("product");

  if (categoriesToShow.length === 0) {
    for (let i = 0; i < allProducts.length; i++) {
      allProducts[i].style.display = "block";
    }
    amountOfProductsShownElement.innerText = `Yhteensä ${allProducts.length} tuotetta`;
    return;
  }

  let amountOfShownElements = 0;
  for (let i = 0; i < allProducts.length; i++) {
    let shouldHide = true;
    for (let j = 0; j < categoriesToShow.length; j++) {
      if (allProducts[i].classList.contains(categoriesToShow[j])) {
        shouldHide = false;
      }
    }
    if (shouldHide) {
      allProducts[i].style.display = "none";
    } else {
      allProducts[i].style.display = "block";
      amountOfShownElements++;
    }
  }

  amountOfProductsShownElement.innerText = `Yhteensä ${amountOfShownElements} tuotetta`;
};

const categories = document.getElementsByClassName("category");

// Add event listeners to all category checkboxes
for (let i = 0; i < categories.length; i++) {
  categories[i].addEventListener('click', applyCategory);
}
