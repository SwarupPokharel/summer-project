-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 11:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `summer`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`pid`, `title`, `price`, `summary`, `description`, `genre`, `image`, `genre_id`) VALUES
(1, '400 Days', 400.00, '‘My daughter Siya was kidnapped. Nine months ago,’ Alia said. The police had given up. They called it a cold case. Even the rest of her family had stopped searching. Alia wouldn’t stop looking, though. She wanted to know if I could help her. Hi, I am Keshav Rajpurohit and I am a disappointment to everyone around me. I live with my parents, who keep telling me how I should a) get married, b) focus on my IPS exams, c) meet more people and d) close my detective agency. But Alia Arora, neighbour and ex-model, wanted my help. And I couldn’t take my eyes off her face … I mean, her case. Welcome to 400 Days. A mystery and romance story like none other. An unputdownable tale of suspense, human relationships, love, friendship, the crazy world we live in and, above all, a mother’s determination to never give up. From India’s highest-selling author comes a page-turner that will not only keep you glued to the story but also touch you deeply.', '‘My daughter Siya was kidnapped. Nine months ago,’ Alia said. The police had given up. They called it a cold case. Even the rest of her family had stopped searching. Alia wouldn’t stop looking, though. She wanted to know if I could help her. Hi, I am Keshav Rajpurohit and I am a disappointment to everyone around me. I live with my parents, who keep telling me how I should a) get married, b) focus on my IPS exams, c) meet more people and d) close my detective agency. But Alia Arora, neighbour and ex-model, wanted my help. And I couldn’t take my eyes off her face … I mean, her case. Welcome to 400 Days. A mystery and romance story like none other. An unputdownable tale of suspense, human relationships, love, friendship, the crazy world we live in and, above all, a mother’s determination to never give up. From India’s highest-selling author comes a page-turner that will not only keep you glued to the story but also touch you deeply.', 'Fiction and Literature', 'images/400Days400.jpeg', 1),
(2, 'A Promised Land', 3198.00, 'A riveting, deeply personal account of history in the making-from the president who inspired us to believe in the power of democracy. In the stirring, highly anticipated first volume of his presidential memoirs, Barack Obama tells the story of his improbable odyssey from young man searching for his identity to leader of the free world, describing in strikingly personal detail both his political education and the landmark moments of the first term of his historic presidency-a time of dramatic transformation and turmoil.', 'A riveting, deeply personal account of history in the making-from the president who inspired us to believe in the power of democracy. In the stirring, highly anticipated first volume of his presidential memoirs, Barack Obama tells the story of his improbable odyssey from young man searching for his identity to leader of the free world, describing in strikingly personal detail both his political education and the landmark moments of the first term of his historic presidency-a time of dramatic transformation and turmoil.', 'History, Biography and Social Science', 'images/APromisedLand3198.jpeg', 3),
(3, 'Aaithan', 695.00, 'In this world, there\'s no suffering quite like the pain of separation. It\'s a story of anguish itself. When a person\'s heart is shattered while living, it\'s not just the heart that\'s broken, it\'s the story of the shattered pieces within. It\'s the agony. It\'s the tale of a young girl violated under the shadow of her mother\'s gaze. And it\'s also the story of blood spilled from the innocence of that young girl\'s womb. It\'s the tale of a son burning in front of his parents, the story of teeth clenched in helplessness by the very mother who bound him in her womb. It\'s the cry of an old man who has lost his sanity. It\'s the agony.', 'In this world, there\'s no suffering quite like the pain of separation. It\'s a story of anguish itself. When a person\'s heart is shattered while living, it\'s not just the heart that\'s broken, it\'s the story of the shattered pieces within. It\'s the agony. It\'s the tale of a young girl violated under the shadow of her mother\'s gaze. And it\'s also the story of blood spilled from the innocence of that young girl\'s womb. It\'s the tale of a son burning in front of his parents, the story of teeth clenched in helplessness by the very mother who bound him in her womb. It\'s the cry of an old man who has lost his sanity. It\'s the agony.', 'Nepali Literature', 'images/Aaithan695.png', 2),
(4, 'Altruism', 1105.00, 'The new bestseller from Matthieu Ricard is the result of a lifetime’s thought. This inspirational book argues that by understanding kindness and developing it as a skill we can change the world.', 'The new bestseller from Matthieu Ricard is the result of a lifetime’s thought. This inspirational book argues that by understanding kindness and developing it as a skill we can change the world.', 'Spirituality and Philosophy', 'images/Altruism.png', 4),
(5, 'Atomic Habit', 1278.00, 'Transform your life with tiny changes in behaviour - starting now. *The instant New York Times bestseller* *Financial Times Book of the Month* People think when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions - doing two push-ups a day, waking up five minutes early, or holding a single short phone call. He calls them atomic habits. In this ground-breaking book, Clears reveals exactly how these minuscule changes can grow into such life-altering outcomes.', 'Transform your life with tiny changes in behaviour - starting now. *The instant New York Times bestseller* *Financial Times Book of the Month* People think when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions - doing two push-ups a day, waking up five minutes early, or holding a single short phone call. He calls them atomic habits. In this ground-breaking book, Clears reveals exactly how these minuscule changes can grow into such life-altering outcomes.', 'History, Biography and Social Science', 'images/AtomicHabit.jpeg', 3),
(6, 'Becoming Steve Jobs', 750.00, 'The #1 New York Times bestselling biography of how Steve Jobs became the most visionary CEO in history. Becoming Steve Jobs breaks down the conventional, one-dimensional view of Steve Jobs that he was half-genius, half-jerk from youth, an irascible and selfish leader who slighted friends and family alike.', 'The #1 New York Times bestselling biography of how Steve Jobs became the most visionary CEO in history. Becoming Steve Jobs breaks down the conventional, one-dimensional view of Steve Jobs that he was half-genius, half-jerk from youth, an irascible and selfish leader who slighted friends and family alike.', 'History, Biography and Social Science', 'images/BecomingSteveJobs.jpeg', 3),
(7, 'Bhagavad Gita As It Is', 450.00, 'The translator provides a blend of literal accuracy and religious insight on the “Bhagavad-Gita”. “Bhagavad-Gita” is universally renowned as the jewel of India’s spiritual wisdom. Spoken by Lord Krishna, the Supreme Personality of Godhead, to His intimate devotee Arjuna, the “Gita’s” 700 concise verses act as a guide to the science of self-realization', 'The translator provides a blend of literal accuracy and religious insight on the “Bhagavad-Gita”. “Bhagavad-Gita” is universally renowned as the jewel of India’s spiritual wisdom. Spoken by Lord Krishna, the Supreme Personality of Godhead, to His intimate devotee Arjuna, the “Gita’s” 700 concise verses act as a guide to the science of self-realization', 'Spirituality and Philosophy', 'images/Bhagavad Gita As It Is.png', 4),
(8, 'China Harayeko Manchhe', 450.00, 'Hari Bansha Acharya is not just a name, but an important introduction in itself. In a world where few Nepalis are known, there are even fewer who haven’t heard of him. He is not only a true and great artist, but also a prominent figure in the ever-changing political and social landscape. What kind of life does such a multifaceted personality lead?', 'Hari Bansha Acharya is not just a name, but an important introduction in itself. In a world where few Nepalis are known, there are even fewer who haven’t heard of him. He is not only a true and great artist, but also a prominent figure in the ever-changing political and social landscape. What kind of life does such a multifaceted personality lead?', 'Nepali Literature', 'images/ChinaHarayekoManchhe.png', 2),
(9, 'Dalai Lama, My Son', 370.00, 'As the mother of the Dalai Lama, Diki Tsering was revered by the Tibetan people and her story is unique. She describes the background and early life of the 14th Dalai Lama, how their family life adapted and the new responsibilities.', 'As the mother of the Dalai Lama, Diki Tsering was revered by the Tibetan people and her story is unique. She describes the background and early life of the 14th Dalai Lama, how their family life adapted and the new responsibilities.', 'History, Biography and Social Science', 'images/Dalai Lama, My Son.jpeg', 3),
(10, 'Dharma', 798.00, '‘. . . Archetypal and stirring. . . Amish’s books unfold the deepest recesses of the soul.’ – DEEPAK CHOPRA Stories can be both entertaining and educative. They can also be insightful and illuminating, especially when they have travelled down the generations, through the centuries, taking on and eliding new meanings with each retelling.', '‘. . . Archetypal and stirring. . . Amish’s books unfold the deepest recesses of the soul.’ – DEEPAK CHOPRA Stories can be both entertaining and educative. They can also be insightful and illuminating, especially when they have travelled down the generations, through the centuries, taking on and eliding new meanings with each retelling.', 'Spirituality and Philosophy', 'images/Dharma.jpeg', 4),
(11, 'Energize Your Mind', 478.00, 'Take charge of your mind. Be in charge of your life. In this book, bestselling author and life coach Gaur Gopal Das decodes how the mind works. He combines his anecdotal style with analytical research to teach us how to discipline our mind for our greater well-being.', 'Take charge of your mind. Be in charge of your life. In this book, bestselling author and life coach Gaur Gopal Das decodes how the mind works. He combines his anecdotal style with analytical research to teach us how to discipline our mind for our greater well-being.', 'Self Improvement and Motivation', 'images/EnergizeYourMind478.jpeg', 5),
(12, 'Eternal Echoes', 950.00, 'There is a divine restlessness in the human heart, our eternal echo of longing that lives deep within us and never lets us settle for what we have or where we are.In this exquisitely crafted and inspirational book, John O’Donohue, author of the bestseller Anam Cara, explores the most basic of human desires – the desire to belong, a desire that constantly draws us toward new possibilities of self-discovery, friendship, and creativity.', 'There is a divine restlessness in the human heart, our eternal echo of longing that lives deep within us and never lets us settle for what we have or where we are.In this exquisitely crafted and inspirational book, John O’Donohue, author of the bestseller Anam Cara, explores the most basic of human desires – the desire to belong, a desire that constantly draws us toward new possibilities of self-discovery, friendship, and creativity.', 'Spirituality and Philosophy', 'images/EternalEchoes.jpeg', 4),
(13, 'I Am That', 780.00, 'This collection of the timeless teachings of one of the greatest sages of India, is a testament to the uniqueness of the seer’s life and work. The book (now in its ninth printing) continues to draw new audiences and to enlighten anxious seekers for self-realisation. Sri Nisargadatta Maharaj was a teacher who did not propound any ideology or religion but gently unwrapped the mystery of the self. His message is simple, direct and yet sublime.', 'This collection of the timeless teachings of one of the greatest sages of India, is a testament to the uniqueness of the seer’s life and work. The book (now in its ninth printing) continues to draw new audiences and to enlighten anxious seekers for self-realisation. Sri Nisargadatta Maharaj was a teacher who did not propound any ideology or religion but gently unwrapped the mystery of the self. His message is simple, direct and yet sublime.', 'Spirituality and Philosophy', 'images/IAmThat.jpeg', 4),
(14, 'Ijoriya', 748.00, 'Subin Bhattarai is known for his versatility—be it in subject matter or style; he always brings something new in every book. As the characters in his stories, like Samar Labh, Priya, and Sufi, evolve, his language, emotions, and geographical settings become even more sophisticated. His ninth book, Ijoriya, is a work of literature that readers will love.', 'Subin Bhattarai is known for his versatility—be it in subject matter or style; he always brings something new in every book. As the characters in his stories, like Samar Labh, Priya, and Sufi, evolve, his language, emotions, and geographical settings become even more sophisticated. His ninth book, Ijoriya, is a work of literature that readers will love.', 'Nepali Literature', 'images/Ijoriya.png', 2),
(15, 'Karnali Blues', 598.00, 'This is a story of a young boy who travels to different phases of his life with his parents. The narrator remembers his childhood, his father’s struggles and the memories of growing up in the Far Western Region of Nepal.', 'This is a story of a young boy who travels to different phases of his life with his parents. The narrator remembers his childhood, his father’s struggles and the memories of growing up in the Far Western Region of Nepal.', 'Nepali Literature', 'images/KarnaliBlues.jpg', 2),
(16, 'Rich Dad Poor Dad', 350.00, 'This book presents financial education through the contrasting experiences and lessons of the author’s two fathers - his biological father and his best friend’s father.', 'This book presents financial education through the contrasting experiences and lessons of the author’s two fathers - his biological father and his best friend’s father.', 'Self Improvement and Motivation', 'images/RichDadPoorDad.png', 5),
(17, 'The Alchemist', 478.00, 'Paulo Coelho’s international bestseller about a shepherd’s journey to discover his personal legend, filled with philosophical insights and inspiring messages.', 'Paulo Coelho’s international bestseller about a shepherd’s journey to discover his personal legend, filled with philosophical insights and inspiring messages.', 'Fiction and Literature', 'images/TheAlchemist.jpeg', 1),
(18, 'The Climb', 638.00, 'The real mountaineer’s story behind the fatal Everest climbs of Into Thin Air.', 'The real mountaineer’s story behind the fatal Everest climbs of Into Thin Air.', 'History, Biography and Social Science', 'images/TheClimb638.jpeg', 3),
(19, 'The Comfort Book', 1110.00, 'Reflections on hope, survival and the messy miracle of being alive It is a strange paradox, that many of the clearest, most comforting life lessons are learned while we are at our lowest. But then we never think about food more than when we are hungry and we never think about life rafts more than when we are thrown overboard.', 'Reflections on hope, survival and the messy miracle of being alive It is a strange paradox, that many of the clearest, most comforting life lessons are learned while we are at our lowest. But then we never think about food more than when we are hungry and we never think about life rafts more than when we are thrown overboard.', 'Spirituality and Philosophy', 'images/TheComfortBook.jpeg', 4),
(20, 'The Google Story', 1000.00, 'The Google Story is the definitive account of one of the most remarkable organizations of our time. Every day over sixty-four million people use Google in more than one hundred languages, running billions of searches for information on everything and anything.', 'The Google Story is the definitive account of one of the most remarkable organizations of our time. Every day over sixty-four million people use Google in more than one hundred languages, running billions of searches for information on everything and anything.', 'History, Biography and Social Science', 'images/The Google Story.jpeg', 3),
(21, 'The Kite Runner', 958.00, 'The Kite Runner of Khaled Hosseini’s deeply moving fiction debut is an illiterate Afghan boy with an uncanny instinct for predicting exactly where a downed kite will land.', 'The Kite Runner of Khaled Hosseini’s deeply moving fiction debut is an illiterate Afghan boy with an uncanny instinct for predicting exactly where a downed kite will land.', 'Fiction and Literature', 'images/TheKiteRunner.jpeg', 1),
(22, 'The Monk Who Sold His Ferrari', 478.00, 'THE BOOK THAT HAS TRANSFORMED MILLIONS OF LIVES. The Monk Who Sold His Ferrari is an inspiring tale that provides a step-by-step approach to expressing your inner genius while you live with greater courage, abundance and joy.', 'THE BOOK THAT HAS TRANSFORMED MILLIONS OF LIVES. The Monk Who Sold His Ferrari is an inspiring tale that provides a step-by-step approach to expressing your inner genius while you live with greater courage, abundance and joy.', 'Self Improvement and Motivation', 'images/The Monk Who Sold His Ferrari.jpeg', 5),
(23, 'The Open Road', 470.00, 'One of the most acclaimed and perceptive observers of globalism and Buddhism now gives us the first serious consideration–for Buddhist and non-Buddhist alike–of the Fourteenth Dalai Lama’s work and ideas as a politician, scientist, and philosopher. Pico Iyer has been engaged in conversation with the Dalai Lama (a friend of his father’s) for the last three decades–an ongoing exploration of his message and its effectiveness.', 'One of the most acclaimed and perceptive observers of globalism and Buddhism now gives us the first serious consideration–for Buddhist and non-Buddhist alike–of the Fourteenth Dalai Lama’s work and ideas as a politician, scientist, and philosopher. Pico Iyer has been engaged in conversation with the Dalai Lama (a friend of his father’s) for the last three decades–an ongoing exploration of his message and its effectiveness.', 'Spirituality and Philosophy', 'images/TheOpenRoad.jpeg', 4),
(24, 'The Subtle Art Of Not Giving A F*ck', 880.00, 'In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be “positive” all the time so that we can truly become better, happier people. For decades, we’ve been told that positive thinking is the key to a happy, rich life. “Fk positivity,” Mark Manson says. “Let’s be honest, shit is fked and we have to live with it.” In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate.', 'In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be “positive” all the time so that we can truly become better, happier people. For decades, we’ve been told that positive thinking is the key to a happy, rich life. “Fk positivity,” Mark Manson says. “Let’s be honest, shit is fked and we have to live with it.” In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate.', 'Self Improvement and Motivation', 'images/TheSubtleArtOfNotGivingAFck.png', 5),
(25, 'Think and Grow Rich', 350.00, 'Napoleon Hill’s seminal work on personal development and success, outlining his philosophy based on the study of many successful individuals.', 'Napoleon Hill’s seminal work on personal development and success, outlining his philosophy based on the study of many successful individuals.', 'Self Improvement and Motivation', 'images/ThinkAndGrowRich.png', 5),
(26, 'To Kill a Mockingbird', 798.00, 'Harper Lee’s Pulitzer Prize-winning novel that tackles serious issues like racial inequality and moral growth through the eyes of young Scout Finch.', 'Harper Lee’s Pulitzer Prize-winning novel that tackles serious issues like racial inequality and moral growth through the eyes of young Scout Finch.', 'Fiction and Literature', 'images/ToKillAMockingbird.jpeg', 1),
(27, 'Who Moved My Cheese', 318.00, '‘Who Moved My Cheese’ is a simple parable that reveals profound truths. It is an amusing and enlightening story of four characters who live in a maze and look for cheese to nourish them and make them happy. Cheese is a metaphor for what you want to have in life – whether it is a good job, a loving relationship, money or a possession, health or spiritual peace of mind.', '‘Who Moved My Cheese’ is a simple parable that reveals profound truths. It is an amusing and enlightening story of four characters who live in a maze and look for cheese to nourish them and make them happy. Cheese is a metaphor for what you want to have in life – whether it is a good job, a loving relationship, money or a possession, health or spiritual peace of mind.', 'Self Improvement and Motivation', 'images/WhoMovedMyCheese318.jpeg', 5),
(28, 'The Intelligent Investor', 1278.00, 'The greatest investment advisor of the twentieth century, Benjamin Graham taught and inspired people worldwide. Graham’s philosophy of “value investing” — which shields investors from substantial error and teaches them to develop long-term strategies — has made The Intelligent Investor the stock market bible ever since its original publication in 1949.', 'The greatest investment advisor of the twentieth century, Benjamin Graham taught and inspired people worldwide. Graham’s philosophy of “value investing” — which shields investors from substantial error and teaches them to develop long-term strategies — has made The Intelligent Investor the stock market bible ever since its original publication in 1949.', 'Business and Investing, Self improvement and Motivation', 'images/TheIntellegentInvestor.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(1, 'Fiction and Literature'),
(2, 'Nepali Literature'),
(3, 'History, Biography and Social Science'),
(4, 'Spirituality and Philosophy'),
(5, 'Self Improvement and Motivation'),
(6, 'Business and Investing, Self Improvement and Motivation');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirm_password`, `address`) VALUES
(1, 'Swarup Pokharel', 'swarup@s.com', 'swarup001', 'swarup001', 'Suncity'),
(2, 'Suraj Pandit', 'suraj@a.com', 'suraj002', 'suraj002', 'Kalanki'),
(3, 'Amisha Shrestha', 'amisha@a.com', 'amisha003', 'amisha003', 'Inaruwa'),
(4, 'Surendra Kunwar', 'surendra@k.com', 'surendra004', 'surendra004', 'Tikapur'),
(5, 'Shova Nyaupane', 'shova@n.com', 'shova005', 'shova005', 'Lalbandi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
