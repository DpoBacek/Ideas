// public/js/app.js

    const canvas = document.getElementById('gameCanvas');
    const context = canvas.getContext('2d');
    let snake = [{ x: 10, y: 10 }];
    let food = generateFood();
    let dx = 10;
    let dy = 0;
    let changingDirection = false;
    let score = 0;

    document.addEventListener('keydown', changeDirection);

    function main() {
        if (didGameEnd()) {
            alert('Game Over');
            location.reload();
            return;
        }

        setTimeout(() => {
            changingDirection = false;
            clearCanvas();
            drawFood();
            advanceSnake();
            drawSnake();

            main();
        }, 100);
    }

    function clearCanvas() {
        context.fillStyle = 'white';
        context.strokestyle = 'black';

        context.fillRect(0, 0, canvas.width, canvas.height);
        context.strokeRect(0, 0, canvas.width, canvas.height);
    }

    function drawFood() {
        context.fillStyle = 'red';
        context.strokestyle = 'darkred';
        context.fillRect(food.x, food.y, 10, 10);
        context.strokeRect(food.x, food.y, 10, 10);
    }

    function advanceSnake() {
        const head = { x: snake[0].x + dx, y: snake[0].y + dy };
        snake.unshift(head);
        const hasEatenFood = snake[0].x === food.x && snake[0].y === food.y;
        if (hasEatenFood) {
            score += 1;
            document.getElementById('score').innerHTML = `Score: ${score}`;
            food = generateFood();
        } else {
            snake.pop();
        }
    }

    function generateFood() {
        let foodX;
        let foodY;

        while (true) {
            foodX = Math.floor(Math.random() * (canvas.width / 10)) * 10;
            foodY = Math.floor(Math.random() * (canvas.height / 10)) * 10;

            const foodOnSnake = snake.some(part => part.x === foodX && part.y === foodY);
            if (!foodOnSnake) {
                break;
            }
        }

        return { x: foodX, y: foodY };
    }

    function drawSnake() {
        snake.forEach(drawSnakePart);
    }

    function drawSnakePart(snakePart) {
        context.fillStyle = 'lightgreen';
        context.strokestyle = 'darkgreen';

        context.fillRect(snakePart.x, snakePart.y, 10, 10);
        context.strokeRect(snakePart.x, snakePart.y, 10, 10);
    }

    function changeDirection(event) {
        const LEFT_KEY = 37;
        const RIGHT_KEY = 39;
        const UP_KEY = 38;
        const DOWN_KEY = 40;

        if (changingDirection) return;
        changingDirection = true;

        const keyPressed = event.keyCode;
        const goingUp = dy === -10;
        const goingDown = dy === 10;
        const goingRight = dx === 10;
        const goingLeft = dx === -10;

        if (keyPressed === LEFT_KEY && !goingRight) {
            dx = -10;
            dy = 0;
        }

        if (keyPressed === UP_KEY && !goingDown) {
            dx = 0;
            dy = -10;
        }

        if (keyPressed === RIGHT_KEY && !goingLeft) {
            dx = 10;
            dy = 0;
        }

        if (keyPressed === DOWN_KEY && !goingUp) {
            dx = 0;
            dy = 10;
        }
    }

    function didGameEnd() {
        const head = snake[0];
        const hitLeftWall = head.x < 0;
        const hitRightWall = head.x >= canvas.width;
        const hitTopWall = head.y < 0;
        const hitBottomWall = head.y >= canvas.height;

        const snakeCollision = snake.slice(1).some(part => part.x === head.x && part.y === head.y);

        return hitLeftWall || hitRightWall || hitTopWall || hitBottomWall || snakeCollision;
    }



