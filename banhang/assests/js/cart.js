var store = getObject();
if (store == null) {
    var num = 0;
} else {
    var num = Object.keys(store).length;
}
changeNumCart(num);
function convertJson(value) {
    return JSON.stringify(value)
}
function parseJson(value) {
    return JSON.parse(value);
}
function getSession(id) {
    return sessionStorage.getItem(id);
}
function saveSession(id, json) {
    sessionStorage.setItem(id, json);
}
function clearSession() {
    sessionStorage.clear();
}
function getObject() {
    let sess = getSession('giohang');
    return parseJson(sess);
}
function issetProduct(id) {
    let flag = false;
    let cart = parseJson(getSession('giohang'));
    if (cart.hasOwnProperty(id)) {
        flag = true;
    }
    return flag;
}
function getInfo(id) {
    let url = document.getElementById("url" + id).src;
    let ten = document.getElementById("ten" + id).textContent;
    let soluong = document.getElementById("soluong" + id);
    let gia = document.getElementById("gia" + id).innerHTML;
    let soluongton_string = document.getElementById("soluonghang" + id).getAttribute('name');
    let soluong_string = soluong.value;

    let soluongton_int = Number.parseInt(soluongton_string);
    let soluong_int = Number.parseInt(soluong_string);
    if (sessionStorage.username == null) {
        alert("Vui lòng đăng nhập để sử dụng tính năng giỏ hàng");
    }
    if (soluongton_int == 0) {
        alert("Sản phẩm tạm hết hàng");
    } else if (soluong_int > soluongton_int) {
        alert("Hàng hóa hiện không đủ vui lòng giảm số lượng");
        soluong.value = soluongton_int;
    } else {
        addProduct(id, ten, url, gia, soluong_int, soluongton_int);
    }
}
function addProduct(id, ten, url, gia, soluong, maxSoluong) {
    if (getSession('giohang') == null) {
        // nếu giỏ trống thì tạo giỏ mới
        let obj = {
            [id]: {
                ten: ten,
                url: url,
                gia: gia,
                soluong: parseInt(soluong),
                max: parseInt(maxSoluong)
            }
        }
        let json = convertJson(obj)
        num++;
        changeNumCart(num)
        alert_success()
        saveSession('giohang', json)
    } else if (issetProduct(id)) {
        // Tồn tại sản phẩm trong giỏ thì tăng số lượng
        let store = parseJson(getSession('giohang'));
        let max = parseInt(store[id].max);
        //kiểm tra có nhập lớn hơn số lượng tồn
        let sluong = parseInt(store[id].soluong) + parseInt(soluong);
        if (sluong > max) {
            sluong = max;
        }
        store[id].soluong = sluong;
        let json = convertJson(store)
        alert_success()
        saveSession('giohang', json)
    } else {
        // sản phẩm mới
        let obj = {
            [id]: {
                ten: ten,
                url: url,
                gia: gia,
                soluong: parseInt(soluong),
                max: parseInt(maxSoluong)
            }
        }
        num++;
        let cart = parseJson(getSession('giohang'));
        let temp = Object.assign(cart, obj);
        let json = convertJson(temp);
        changeNumCart(num);
        alert_success();
        saveSession('giohang', json);
    }

}
function changeNumCart(number) {
    let el = document.getElementById('num_cart');
    el.innerHTML = number;
}
function alert_success() {
    let aler = document.getElementById('alert_add')
    aler.classList.remove('d-none')
    aler.classList.add('d-block')
    setTimeout(function () {
        aler.classList.add('d-none')
        aler.classList.remove('d-block')
    }, 2000);
}
Object.size = function (obj) {
    let size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
//Hiển thị cart
function showCard() {
    let body = document.getElementById('cart_body');
    let list_product = getObject();
    let i = 0;
    let data = '';
    let size = Object.size(list_product);
    if (size != 0) {
        for (const key in list_product) {
            if (list_product.hasOwnProperty(key)) {
                //console.log(key)
                const item = list_product[key];
                i++;
                data = data + `<tr id="${key}cart" name="${key}">
            <th scope="row">#${key}</th>
            <td class="position-relative"><img src="${item.url}" alt="" class="img-fluid" width="100px" height="50px"
                                        style="object-fit: contain;"></img></td>
            <td><strong>${item.ten}</strong></td>
            <td>${item.gia}</td>
            <td>${item.max}</td>
            <td class="input_soluong"> <input style="width: 50px;" type="number" name="${key}" value="${item.soluong}" min="1" onchange="update_cart()"></td>
            <td><button name="${key}" onclick="xoa_cart(this.name)" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button></td>
        </tr>`
            }
        }
    } else {
        data = `<td colspan="6"><h3 class="text-center text-danger">Giỏ hàng trống</h3></td>`
    }
    body.innerHTML = data;
    $('#cart_body').append("<td colspan='7'><h4>Tổng Cộng: <span class='text-danger' id='sum_cart'>0</span></h4></td>");
    let show_cost = document.getElementById('sum_cart');
    showInfo();
    updateSum();
}
function updateSum() {
    let store = parseJson(getSession('giohang'));
    let sum = 0;
    for (const key in store) {
        if (store.hasOwnProperty(key)) {
            const element = store[key];
            let gia = element.gia;
            let soluong = parseInt(element.soluong);
            let value = parseInt(gia.replaceAll(",", ""));
            //don gia
            let dongia = soluong * value;
            sum += dongia;
        }
    }
    let temp = new Intl.NumberFormat().format(sum)
    $('#sum_cart').text(temp);
}
//Tiếp tục mua hàng
function update_cart() {
    let store = parseJson(getSession('giohang'));
    if (typeof (store) != "undefined") {
        let i = 0;
        let soluong_arr = [];
        $(".input_soluong :input[type=number]").each(function () {
            let max = store[$(this).attr('name')].max;
            let val = $(this).val()
            if (val > max) {
                //$(this).val(parseInt(max))
                soluong_arr.push(max);
            } else if (val < 0) {
                soluong_arr.push(1);
            } else {
                soluong_arr.push($(this).val());
            }
        });
        for (const key in store) {
            if (store.hasOwnProperty(key)) {
                const element = store[key];
                element['soluong'] = soluong_arr[i];
                let json = convertJson(store)
                saveSession('giohang', json)
            }
            i++;
        }
    }
    showCard();
    updateSum();
}
// Xóa sản phẩm
function xoa_cart(id) {
    let item = document.getElementById(id + "cart");
    let store = parseJson(getSession('giohang'));
    if (typeof (store) != "undefined") {
        let id = item.getAttribute('name');
        delete store[id];
        let json = convertJson(store)
        num--;
        changeNumCart(num);
        saveSession('giohang', json)
        showCard();
    }
}
// Hiển thị thông tin
function showInfo() {
    let body_info_cart = document.getElementById('info_user_cart');
    let content = '';
    if (sessionStorage.username == null) {
        content = `<div class="col-7">
        <div class="col-7">
            <h3>Thông tin đặt hàng</h3>
            <p>Tên: <input type="text" class="form-control" id='name_cart' required> </p>
            <p>SĐT: <input type="text" pattern="[0-9]{11}" class="form-control" id='phone_cart'
                    required>
            </p>
            <p>Email: <input type="email" class="form-control" id='email_cart' required></p>
        </div>
    </div>
    <div class="col-5">
        <h3>Địa chỉ</h3>
        <p><input type="text" class="form-control" id='input_diachi_cart' required> </p>
    </div>`;
        body_info_cart.innerHTML = content;
    } else {
        let mskh = sessionStorage.MSKH;
        let send = fetch('API/db_user.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                mskh: mskh,
                action: 'getInfo'
            })
        })
            .then(Response => Response.json())
            .then(data => showInfoUser(data))
            .catch(err => console.log(err))
    }
}
function showInfoUser(data) {
    // console.log(data);
    let body_info_cart = document.getElementById('info_user_cart');
    let content = '';
    let hoten = data.HoTen;
    let phone = data.SoDienThoai;
    let email = data.Email;
    content = ` <div class="col-7">
                <h3>Thông tin đặt hàng</h3>
                         <div class="ms-2 mt-2">
                            <p>Tên: <strong>${hoten}</strong> </p>
                            <p>SĐT: <strong>${phone}</strong></p>
                            <p>Email: <strong>${email}</strong></p>
                        </div>
                 </div>
                 <div class="col-5" id='address_user'>
                            <h3>Địa chỉ</h3>
                            <select class="form-select" id='input_diachi_cart' aria-label="Default select example">
                            </select>
                            <button class="btn btn-primary my-3" onclick="newAddress()">Sử dụng địa chỉ mới</button>
                </div>`;
    body_info_cart.innerHTML = content;
    let send = fetch('API/db_user.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            mskh: data.MSKH,
            action: 'getInfoAddress'
        })
    })
        .then(Response => Response.json())
        .then(data => showAddress(data))
        .catch(err => console.log(err))
}
function showAddress(data) {
    //console.log(data);
    let select = document.getElementById('input_diachi_cart');
    let address = data.map(function (item) {
        return `
        <option value=${item.MaDC}>${item.DiaChi}</option>
        `
    });
    select.innerHTML = address.join('');
}
function newAddress() {
    let address_user = document.getElementById('address_user');
    let input =
        `<h3>Địa chỉ</h3>
        <div class="input-group">
        <span class="input-group-text">Nhập địa chỉ</span>
        <textarea class="form-control" id='input_diachi_cart' aria-label="With textarea"></textarea>
    </div>
    <div>
    <button class="btn btn-primary my-3" onclick="showInfo()">Sử dụng địa chỉ có sẳn</button>
        <button class="btn btn-success" onclick="luuDiaChi()">Lưu địa chỉ mới</button>
        <p>(Lưu địa chỉ để sử dụng cho lần kế tiếp)</p>
    </div>`;
    let btn_thanhtoan = document.getElementById('btn_thanhtoan');
    btn_thanhtoan.classList.add('d-none');
    address_user.innerHTML = input;
}
function luuDiaChi() {
    let mskh = sessionStorage.MSKH;
    let diachi = document.getElementById('input_diachi_cart').value;
    if (diachi.length > 5) {
        let send = fetch('API/db_user.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'themDiaChi',
                mskh: mskh,
                diachi: diachi
            })
        })
            .then(Response => Response.json())
            .then(data => {
                alert(data)
                showInfo();
                let btn_thanhtoan = document.getElementById('btn_thanhtoan');
                btn_thanhtoan.classList.remove('d-none');
            })
            .catch(err => console.log(err))
    } else {
        alert('Vui lòng điền địa chỉ');
    }
}
function thanhToan() {
    let alert_text = "Bạn có muốn đặt hàng !!";
    let list_product = parseJson(getSession('giohang'));
    let diachi = document.getElementById('input_diachi_cart').value;
    var temp_obj = {};
    console.log(diachi);
    if (confirm(alert_text)) {
        if (sessionStorage.MSKH != undefined) {
            let object = {
                info: {
                    mskh: sessionStorage.MSKH,
                    diachi: diachi,
                    ten: sessionStorage.username
                }
            };
            temp_obj = Object.assign(list_product, object);
            let send = fetch('API/db_payment.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    object_mskh: temp_obj
                })
            })
                .then(Response => Response.json())
                .then(data => {
                    if (data == 0) {
                        alert("Đặt hàng thành công");
                        sessionStorage.removeItem('giohang');
                        location.reload();
                    } else {
                        alert("Vui lòng thử lại");
                    }
                })
                .catch(err => console.log(err))
        }
    }

}
