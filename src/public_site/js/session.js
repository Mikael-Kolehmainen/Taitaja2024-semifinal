const storeLink = document.getElementById("store-link");

const saveStoreSession = () => {
  sessionStorage.setItem("shop", JSON.stringify({ "session": uuidv4(), "items": [] }));
};

storeLink.addEventListener("click", saveStoreSession);
