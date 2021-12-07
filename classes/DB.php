<?php


namespace classes;
use PDO;

class DB
{
    private $host, $username, $pass, $dbname, $port;
    private $connection;

    /**
     * DB constructor.
     * @param $host
     * @param $username
     * @param $pass
     * @param $dbname
     * @param $port
     * @param $connection
     */
    public function __construct($host, $username, $pass, $dbname, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->port = $port;

        try {
            $this->connection = new PDO("mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname, $username, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMenu()
    {
        $sql = "SELECT * FROM menu";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllArticles() {
        $sql = "SELECT posts.id, posts.title, posts.perex, posts.created_at, posts.image, users.username, categories.cat_name AS category
                FROM posts 
                INNER JOIN users ON posts.users_id = users.id
                INNER JOIN categories ON posts.categories_id = categories.id
                ORDER BY posts.created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticle($postId) {
        $sql = "SELECT posts.id AS id, posts.title AS title, posts.content AS content, posts.perex AS perex, posts.created_at AS created_at, posts.image AS image, users.username AS username, categories.cat_name AS category
                FROM posts 
                INNER JOIN users ON posts.users_id = users.id
                INNER JOIN categories ON posts.categories_id = categories.id
                WHERE posts.id = :post_id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':post_id', $postId);
        $stm->execute();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArchivesByDate() {
        $sql = "SELECT created_at, COUNT(created_at) AS countCA 
                FROM posts 
                GROUP BY MONTH(created_at) 
                ORDER BY created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArchivesByCategory() {
        $sql = "SELECT categories.cat_name AS category, COUNT(categories.cat_name) AS countC 
                FROM posts 
                INNER JOIN categories ON categories.id = posts.categories_id
                GROUP BY categories.cat_name
                ORDER BY categories.cat_name ASC";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArchivesByAuthor() {
        $sql = "SELECT users.username AS userName, COUNT(users.username) AS countA 
                FROM posts 
                INNER JOIN users ON users.id = posts.users_id
                GROUP BY users.username
                ORDER BY users.username ASC";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticlesByDate($articleDate) {
        $sql = "SELECT posts.id, posts.title, posts.perex, posts.created_at, posts.image, users.username, categories.cat_name AS category 
                FROM posts 
                INNER JOIN categories ON categories.id = posts.categories_id 
                INNER JOIN users ON users.id = posts.users_id
                WHERE YEAR(posts.created_at) = YEAR(:article_date) AND MONTH(posts.created_at) = MONTH(:article_date) 
                ORDER BY posts.created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':article_date', $articleDate);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticlesByCategory($articleCategory) {
        $sql = "SELECT posts.id, posts.title, posts.perex, posts.created_at, posts.image, users.username, categories.cat_name AS category
                FROM posts
                INNER JOIN categories ON categories.id = posts.categories_id
                INNER JOIN users ON users.id = posts.users_id
                WHERE categories.cat_name = :article_category
                GROUP BY posts.created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':article_category', $articleCategory);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticlesByAuthor($articleAuthorName) {
        $sql = "SELECT posts.id, posts.title, posts.perex, posts.created_at, posts.image, users.username, categories.cat_name AS category
                FROM posts
                INNER JOIN categories ON categories.id = posts.categories_id
                INNER JOIN users ON users.id = posts.users_id
                WHERE users.username = :author_name
                GROUP BY posts.created_at DESC";

        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':author_name', $articleAuthorName);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticlesByAuthorId($authorId) {
        $sql = "SELECT posts.id AS id, posts.title AS title, posts.content AS content, posts.perex AS perex, posts.created_at AS created_at, posts.image AS image, users.username AS username, categories.cat_name AS category
                FROM posts
                INNER JOIN categories ON categories.id = posts.categories_id
                INNER JOIN users ON users.id = posts.users_id
                WHERE users.id = :authorId
                GROUP BY posts.created_at DESC";

        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':authorId', $authorId);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getRecentPosts() {
        $sql = "SELECT id, title, created_at, image
                FROM posts 
                ORDER BY created_at DESC LIMIT 3";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllPhotos() {
        $sql = "SELECT * FROM photos";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllFormats() {
        $sql = "SELECT * FROM formats";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertOrder($firstName, $lastName, $number, $email, $address, $zip, $city, $country, $photoName, $size, $frame) {
        $sqlPhoto = "SELECT id FROM photos WHERE photo_name = :photoName";
        $stmPhoto = $this->connection->prepare($sqlPhoto);
        $stmPhoto->bindValue(':photoName', $photoName);
        $stmPhoto->execute();
        $photoId = $stmPhoto->fetchColumn();

        $sqlFormat = "SELECT id FROM formats WHERE size = :size";
        $stmFormat = $this->connection->prepare($sqlFormat);
        $stmFormat->bindValue(':size', $size);
        $stmFormat->execute();
        $formatId = $stmFormat->fetchColumn();

        $sqlPrice = "SELECT price FROM formats WHERE id = :formatId";
        $stmPrice = $this->connection->prepare($sqlPrice);
        $stmPrice->bindValue(':formatId', $formatId);
        $stmPrice->execute();
        $formatPrice = $stmPrice->fetchColumn();

        if($frame == 1) {
            $totalPrice = $formatPrice + 5;
        } else $totalPrice = $formatPrice;

        $sql = "INSERT INTO orders (first_name, last_name, phone_number, email, address, postcode, city, country, photo_id, format_id, frame, total_price) 
                VALUES (:firstName, :lastName, :phoneNumber, :email, :address, :postcode, :city, :country, :photoId, :formatId, :frame, :price)";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':firstName', $firstName);
        $stm->bindValue(':lastName', $lastName);
        $stm->bindValue(':phoneNumber', $number);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':address', $address);
        $stm->bindValue(':postcode', $zip);
        $stm->bindValue(':city', $city);
        $stm->bindValue(':country', $country);
        $stm->bindValue(':photoId', $photoId);
        $stm->bindValue(':formatId', $formatId);
        $stm->bindValue(':frame', $frame);
        $stm->bindValue(':price', $totalPrice);
        $result = $stm->execute();

        return $result;
    }

    public function checkLogInInformation($email, $passwd) {
        $sql = "SELECT id FROM users WHERE email = :email AND passwd = :passwd";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":email", $email);
        $stm->bindValue(":passwd", $passwd);
        $stm->execute();
        $result = $stm->fetchColumn();

        return $result;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertPost($title, $perex, $content, $imagePath, $categoryId, $userId) {
        $date = date("Y-m-d H:i:s", time());

        $sql = "INSERT INTO posts (title, perex, created_at, content, image, categories_id, users_id) 
                VALUES (:title, :perex, '".$date."', :content, :imagePath, :categoryId, :userId)";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':title', $title);
        $stm->bindValue(':perex', $perex);
        $stm->bindValue(':content', $content);
        $stm->bindValue(':imagePath', $imagePath);
        $stm->bindValue(':categoryId', $categoryId);
        $stm->bindValue(':userId', $userId);
        $result = $stm->execute();

        return $result;
    }

    public function updatePost($title, $perex, $content, $imagePath, $categoryId, $userId, $postId) {
        $sql = "UPDATE posts SET title = :title, perex = :perex, content = :content, image = :imagePath, categories_id = :categoryId, users_id = :userId
                WHERE id = :postId";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':title', $title);
        $stm->bindValue(':perex', $perex);
        $stm->bindValue(':content', $content);
        $stm->bindValue(':imagePath', $imagePath);
        $stm->bindValue(':categoryId', $categoryId);
        $stm->bindValue(':userId', $userId);
        $stm->bindValue(':postId', $postId);
        $result = $stm->execute();

        return $result;
    }

    public function deletePost($postId) {
        //vymazať aj obrázok, ktorý bol v tomto poste !!
        $sql = "DELETE FROM posts WHERE id = :postId";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':postId', $postId);
        $result = $stm->execute();

        return $result;
    }

    public function getAuthorName($authorId) {
        $sql = "SELECT username FROM users WHERE id = :authorId";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":authorId", $authorId);
        $stm->execute();
        $result = $stm->fetchColumn();

        return $result;
    }

    public function insertMessage($name, $email, $message) {
        $date = date("Y-m-d H:i:s", time());

        $sql = "INSERT INTO messages (name, email, message, created_at) 
                VALUES (:customer_name, :email, :message, '".$date."')";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':customer_name', $name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':message', $message);
        $result = $stm->execute();

        return $result;
    }
}