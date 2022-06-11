const ajax = (data) => {
  if (data.type === undefined || data.url === undefined) {
    alert("Undefined type/url: request = {type:type, url: url}");
    return;
  }
  const type = data.type;
  const url = data.url;
  const xmlhttp = new XMLHttpRequest();

  return new Promise((resolve, reject) => {
      xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        console.log(xmlhttp.responseText);
        resolve(xmlhttp.responseText);
      }
    }
    if(data.params && data.params!== 'undefined') {
      const params = data.params;
      xmlhttp.send(params);
    }else{
      xmlhttp.send();
    }
  });
};

const createModal = (content) => {
  let modal = document.createElement("div");
  let modalContent = document.createElement("div");
  let closeModal = document.createElement("span");
  modal.classList.add("modal");
  modalContent.classList.add("modal-content");
  closeModal.classList.add("close");

  modalContent.innerHTML = content;
  closeModal.innerHTML = "&times;";

  modalContent.append(closeModal);
  modal.append(modalContent);

  modal.style.display = "block";
  document.body.appendChild(modal);

  closeModal.addEventListener('click', () => {
    modal.style.display = "none";
  });
}

const decodeJwtResponse = (token) => {
  let base64Url = token.split('.')[1];
  let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
  let jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
  }).join(''));

  return JSON.parse(jsonPayload)
}

export { ajax, createModal, decodeJwtResponse};
