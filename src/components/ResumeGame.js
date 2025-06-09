// ResumeGame.js
import { useState, useEffect } from 'react';
import axios from 'axios';

function ResumeGame() {
  const [playerScores, setPlayerScores] = useState([]);

  // Fetch the player's previous scores
  useEffect(() => {
    axios.get('/game/resume')
      .then(response => {
        setPlayerScores(response.data.scores);
      })
      .catch(error => {
        console.log(error);
      });
  }, []);

  // Resume the game state based on the player's previous scores
  const resumeGame = () => {
    // Calculate the current score
    let currentScore = calculateCurrentScore();

    // Check if the player has reached a new high score
    if (currentScore > highestScore) {
      setHighestScore(currentScore);
    }
  };

  return (
    <div>
      <h1>Resume Game</h1>
      <p>Player Scores: {playerScores.join(', ')}</p>
      <button onClick={resumeGame}>Resume Game</button>
    </div>
  );
}