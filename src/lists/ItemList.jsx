import React from 'react';
import { render } from 'react-dom';

// Composant Functionnel pour le bouton d'effacement du historique
const ClearHistoryButton = () => (
  <button onClick={() => window.history.clear()} type="button">
    Effacer l'historique
  </button>
);

// Composant de classe pour la page d'accueil
class HomePage extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      history: []
    };
  }

  componentDidMount() {
    // Récupérer l'historique des visites à partir du localStorage
    const history = JSON.parse(localStorage.getItem('history'));
    if (history) {
      this.setState({ history });
    }
  }

  render() {
    return (
      <div>
        <h1>Accueil</h1>
        <p>Vous êtes connecté en tant que {this.props.username}</p>
        <ClearHistoryButton />
        <ul>
          {this.state.history.map((item, index) => (
            <li key={index}>{item.title}</li>
          ))}
        </ul>
      </div>
    );
  }
}

// Composant fonctionnel pour la page de détails
const DetailsPage = ({ id }) => {
  const history = JSON.parse(localStorage.getItem('history'));
  if (!history) return null;

  // Rechercher l'élément correspondant à l'id dans l'historique des visites
  const item = history.find((item) => item.id === id);

  // Ajouter l'élément à l'historique s'il n'y est pas déjà
  if (!item) {
    history.push({ title: `Voir le détails de ${id}` });
    localStorage.setItem('history', JSON.stringify(history));
  }

  return (
    <div>
      <h1>Détails</h1>
      <p>Vous êtes connecté en tant que {this.props.username}</p>
      <ul>
        {history.map((item, index) => (
          <li key={index}>{item.title}</li>
        ))}
      </ul>
    </div>
  );
};

// Exporter les composants pour qu'ils soient accessibles dans d'autres fichiers
export { HomePage, DetailsPage };