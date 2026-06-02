USE blog;

INSERT INTO `users` (`id`, `username`, `email`, `avatar_url`, `bio`) VALUES
(1, 'Ivan Денисов', 'vanya@example.com', 'image/avatar1.jpg', 'Привет! Я системный аналитик в ACME :)'),
(2, 'Лиза Дёмина', 'liza@example.com', 'image/avatar2.jpg', 'Рыбки - моя страсть.');

ALTER TABLE `users` AUTO_INCREMENT = 3;