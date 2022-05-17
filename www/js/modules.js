const ajax = (data) => {
  if (data.type == undefined || data.url == undefined) {
    alert("Undefined type/url: request = {type:type, url: url}");
    return;
  }
  const type = data.type;
  const url = data.url;
  const xmlhttp = new XMLHttpRequest();
  return new Promise((resolve, reject) => {
    xmlhttp.onload = function () {
      resolve(this.response);
    };
    xmlhttp.open(type, url);
    xmlhttp.send();
  });
};

export { ajax };
