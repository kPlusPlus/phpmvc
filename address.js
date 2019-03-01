var ab = {
  ajax: function (data, after) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "process.php", true);
    xhr.onload = function () {
      var res = JSON.parse(this.response);
      if (after !== undefined) { after(res); }
    };
    xhr.send(data);
  },
 
  prime: function (id) {
    document.getElementById("ab_form_head").innerHTML = id==0 ? "Add Entry" : "Edit Entry" ;
    document.getElementById("form_id").value = id==0 ? "" : id ;
    document.getElementById("form_address").value = id==0 ? "" : document.getElementById("addr"+id).innerHTML ;
    document.getElementById("btn_save").onclick = id==0 ? ab.create : ab.update ;
    document.getElementById("ab_form").style.display = "block";
  },

  create: function () {
    var data = new FormData();
    data.append('req', 'create');
    data.append('address', document.getElementById("form_address").value);
    ab.ajax(data, function(res){
      var message = "";
      if (res.status == true) {
        message += "<div class='container green'>";
        ab.read();
      } else {
        message += "<div class='container red'>";
      }
      message += res.message + "</div>";
      document.getElementById("ab_msg").innerHTML = message;
      document.getElementById("ab_form").style.display = "none";
    });
  },
 
  read: function () {
    document.getElementById("addresses").innerHTML = "";
    var data = new FormData();
    data.append('req', 'read');
    ab.ajax(data, function (res) {
      if (res.data == null) {
        document.getElementById("addresses").innerHTML = "No entries found";
      } else {
        var list = "<table>";
        for (var i = 0; i < res.data.length; i++) {
          list += "<tr><td id='addr" + res.data[i]['id'] + "'>" + res.data[i]['address'] + "</td>";
          list += "<td><input type='button' class='red' value='Delete' onclick='ab.delete(" + res.data[i]['id'] + ")'/>";
          list += " <input type='button' class='green' value='Edit' onclick='ab.prime(" + res.data[i]['id'] + ")'/></td></tr>";
        }
        list += "</table>";
        document.getElementById("addresses").innerHTML = list;
      }
    });
  },
 
  update: function () {
    var data = new FormData();
    data.append('req', 'update');
    data.append('id', document.getElementById("form_id").value);
    data.append('address', document.getElementById("form_address").value);
   ab.ajax(data, function(res){
      var message = "";
      if (res.status == true) {
        message += "<div class='container green'>";
        ab.read();
      } else {
        message += "<div class='container red'>";
      }
      message += res.message + "</div>";
      document.getElementById("ab_msg").innerHTML = message;
      document.getElementById("ab_form").style.display = "none";
    });
  },
 
  delete: function (id) {
    var data = new FormData();
    data.append('req', 'delete');
    data.append('id', id);
    ab.ajax(data, function(res){
      var message = "";
      if (res.status == true) {
        message += "<div class='container green'>";
        ab.read();
      } else {
        message += "<div class='container red'>";
      }
      message += res.message + "</div>";
      document.getElementById("ab_msg").innerHTML = message;
      document.getElementById("ab_form").style.display = "none";
    });
  }
};
 
window.onload = function () {
  ab.read();
};