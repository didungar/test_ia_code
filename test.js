// test.js
import React from 'react';
import ReactDOM from 'react-dom';

class TestComponent extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isLoading: false,
      errorMessage: '',
      data: []
    };
  }

  componentDidMount() {
    fetch('https://api.example.com/data')
      .then(response => response.json())
      .then(data => this.setState({ data }));
  }

  render() {
    const { isLoading, errorMessage, data } = this.state;

    if (isLoading) {
      return <div>Chargement...</div>;
    }

    if (errorMessage) {
      return <div>{errorMessage}</div>;
    }

    return (
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    );
  }
}

// test.spec.js
import React from 'react';
import TestComponent from './test';
import { render, fireEvent, waitFor } from '@testing-library/react';

describe('TestComponent', () => {
  it('should fetch data and display it correctly', async () => {
    const { container } = render(<TestComponent />);

    // Trigger the fetch request
    fireEvent.click(container.querySelector('.fetch-data'));

    // Wait for the fetch to complete
    await waitFor(() => {
      expect(container.textContent).toContain('Chargement...');
    });

    // Wait for the data to be fetched and displayed
    await waitFor(() => {
      expect(container.textContent).not.toContain('Chargement...');
      expect(container.querySelectorAll('li')).toHaveLength(3);
    });
  });
});