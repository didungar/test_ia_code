import React, { useState } from 'react';

class Stack extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      items: [],
      currentItem: null
    };
  }

  handlePush = (item) => {
    const newItems = [...this.state.items];
    newItems.push(item);
    this.setState({ items: newItems, currentItem: item });
  }

  handlePop = () => {
    if (this.state.currentItem !== null) {
      const newCurrentItem = this.state.items[this.state.items.length - 1];
      this.setState({ items: this.state.items.slice(0, -1), currentItem: newCurrentItem });
    }
  }

  handleReset = () => {
    this.setState({ items: [], currentItem: null });
  }

  render() {
    return (
      <div>
        <h2>Stack</h2>
        <button onClick={this.handlePush}>Push</button>
        <button onClick={this.handlePop}>Pop</button>
        <button onClick={this.handleReset}>Reset</button>
        {this.state.currentItem !== null && (
          <div>Current item: {this.state.currentItem}</div>
        )}
      </div>
    );
  }
}