const openCategoryViewerElement = document.getElementById("open-category-viewer");
const isOpen = false;

const openCategoryView = () => {
  isOpen = !isOpen;

};

openCategoryViewerElement.addEventListener("click", openCategoryView);
