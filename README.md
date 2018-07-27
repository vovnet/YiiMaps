1) Создать бд с одной таблицей: places (id, address, lat, lng)
2) Организовать crud (create, read, update, delete) для places

Страница Create, Update
поле address (input) и карта google maps (https://developers.google.com/maps/documentation/javascript/geocoding)
При вводе адреса - на карте отображается маркер, с маркера берем lat и lng
Если введен некорректный адрес и нет lat и lng, не даем сохранять.

Place listing -
аналогичный текущему функционалу, только данные надо брать из базы.