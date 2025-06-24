import { useState } from 'react';

function Game() {
  const [player, setPlayer] = useState({ name: '', score: 0 });
  const [gameStarted, setGameStarted] = useState(false);

  function handleStartNewGame() {
    // Vérifier si le jeu a déjà démarré ou non
    if (gameStarted) {
      // Si oui, remettre à zéro les informations du joueur en cours
      setPlayer({ name: '', score: 0 });
    } else {
      // Sinon, enregistrer les informations du joueur en cours et démarrer le jeu
      const newPlayer = { name: player.name, score: player.score };
      setGameStarted(true);
      setPlayer({ ...newPlayer, score: newPlayer.score + 1 });
    }
  }

  return (
    <div>
      {/* Afficher les informations du joueur en cours */}
      <p>Nom : {player.name}</p>
      <p>Score : {player.score}</p>
      <button onClick={handleStartNewGame}>Démarrer une nouvelle partie</button>
    </div>
  );
}