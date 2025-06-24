import React, { useState } from 'react';

const ScoreBoard = () => {
  const [scores, setScores] = useState([]);

  // function to add a new score to the scores array
  const addScore = (score) => {
    setScores((prevScores) => [...prevScores, score]);
  };

  // function to remove a score from the scores array
  const removeScore = (index) => {
    setScores((prevScores) => prevScores.filter((_, i) => i !== index));
  };

  return (
    <div>
      <h1>Score Board</h1>
      <ul>
        {scores.map((score, index) => (
          <li key={index}>
            <span>{score}</span>
            <button onClick={() => removeScore(index)}>Remove</button>
          </li>
        ))}
      </ul>
    </div>
  );
};