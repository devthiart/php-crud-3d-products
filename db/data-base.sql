CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    foto_url VARCHAR(255),
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL
);

INSERT INTO produtos (nome, foto_url, descricao, preco) VALUES
    ('Raposa Preguicinha', 'https://stlflix.b-cdn.net/Fox_Linger_1_c5ed476135.png?format=webp&width=700', 'Raposa Preguicinha impressa em 3D. Aproximadamente 7 centímetros.', 24.99),
    ('Dragonut', 'https://stlflix.b-cdn.net/Dragonut1_bc36173117.jpg?format=webp&width=700', 'Dragão donut impresso em 3D. Aproximadamente 6 centímetros.', 24.99),
    ('Orange Slaceratops', 'https://stlflix.b-cdn.net/Orange_Sliceratops_1_e25f1b5e76.png?format=webp&width=700', 'Um fóssil da era das frutas. Pode atacar se ameaçado ou espremido para extrair suco. Aproximadamente 9 centímetros', 29.99);
