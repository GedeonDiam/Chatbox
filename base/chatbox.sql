create database chat_Box_Finale;
use chat_Box_Finale;

create table users (
  id_user int auto_increment primary key,
  nom varchar(255),
  prenom varchar(255),
  email varchar(255),
  password varchar(255)
);

create table messages (
  id_message int auto_increment primary key,
  contenu varchar(255),
  id_user int,
  date varchar(255),
  foreign key (id_user) references users(id_user)
);

INSERT INTO users (nom, prenom, email, password) VALUES 
('Dupont', 'Jean', 'jean.dupont@email.com', 'password123'),
('Martin', 'Sophie', 'sophie.martin@email.com', 'password234'),
('Durand', 'Luc', 'luc.durand@email.com', 'password345'),
('Petit', 'Isabelle', 'isabelle.petit@email.com', 'password456'),
('Bernard', 'François', 'francois.bernard@email.com', 'password567');

-- Messages pour l'utilisateur 1
INSERT INTO messages (contenu, id_user, date) VALUES 
('Bonjour, ceci est mon premier message !', 1, '2024-03-17 08:00:00'),
('Il fait beau aujourd\'hui.', 1, '2024-03-18 09:30:00'),
('J\'ai fini de lire un excellent livre.', 1, '2024-03-19 15:45:00'),
('Qui va au cinéma ce weekend ?', 1, '2024-03-20 18:20:00'),
('Bon weekend à tous !', 1, '2024-03-21 20:00:00');

-- Répétez cette étape pour les utilisateurs 2 à 5 avec des messages personnalisés et des dates.

-- Messages pour l'utilisateur 2
INSERT INTO messages (contenu, id_user, date) VALUES 
('Salut tout le monde, comment ça va ?', 2, '2024-03-17 10:00:00'),
('J\'ai commencé un nouveau projet.', 2, '2024-03-18 11:30:00'),
('Des conseils pour rester motivé ?', 2, '2024-03-19 16:45:00'),
('Quelqu\'un connaît un bon restaurant italien ?', 2, '2024-03-20 19:20:00'),
('Passez une excellente soirée !', 2, '2024-03-21 21:00:00');

