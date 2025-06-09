// game.js
import React, { useState } from 'react';

function Game() {
  const [score, setScore] = useState(0);

  // ... other state and props handling code here ...

  return (
    <div className="game">
      <p>Your score: {score}</p>
      <button onClick={() => setScore(score + 1)}>Click me</button>
    </div>
  );
}