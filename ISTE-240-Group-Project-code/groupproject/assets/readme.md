# **Rain World Survival Guide – Web Design Document**

## **Title Page**

* **Project Title:** Rain World Survival Guide
* **Team Name:** Philadelphia
* **Team Members:** Chaynj, Jack, Jeffrey
* **Course / Instructor:** ISTE-240 – Robert Kostin
* **Date:** March 3, 2026

## **1. Introduction and Project Overview**

### **High-Level Description**

The Rain World Survival Guide is a user-friendly website designed to help players understand regions, creatures, and core survival systems in *Rain World*. It improves navigation and learning without providing full walkthroughs or spoilers, preserving the challenge and discovery of the game.

### **Purpose Statement**

This website helps players understand the structure, environments, and survival mechanics of *Rain World* so they can navigate more effectively while still maintaining the game’s intended difficulty and exploration.

## **2. Site Goals**

### **Measurable Goals**

* Users identify **3+ key features** per region
* Users differentiate **predators vs prey** and describe behaviors
* Users explain **core survival systems** (food, hibernation, rain cycle)
* New players report **increased confidence** (via survey)
* Users find content within **2–3 clicks**
* **80%+ completion rate** for guided learning path

### **Content Goals**

* Region overviews with hazards and traversal notes
* Behavior breakdowns for key creatures
* Interactive quizzes for survival systems
* Bookmark/save functionality
* Maintain exploration without spoilers

## **3. Interactivity, Engagement, and Data Persistence**

### **Interactivity**

* Clickable region maps
* Hover-reveal creature behaviors
* Interactive quizzes

### **Engagement**

* Progress tracking
* Quiz feedback
* Suggested learning paths

### **Data Persistence**

* Local storage used to save:

  * Bookmarks
  * Progress
  * Quiz scores

## **4. Audience Definition**

* PC and console gamers
* Fans of challenging single-player experiences

## **5. Personas**

### **Persona 1 – Competitive Gamer**

* Wants to improve skill and efficiency
* Interested in mechanics and optimization

### **Persona 2 – Biologist**

* Interested in ecosystem and creature behavior
* Focused on environmental storytelling

## **6. Competitive Analysis**

### **What Exists**

* Wiki-style pages (too text-heavy)
* YouTube guides (often spoiler-heavy)

### **Our Advantage**

* Simplified structure
* Visual learning (maps, diagrams)
* Interactive elements
* Spoiler-free design

## **7. Site Content**

### **6A. Navigation Structure**

**Main Navigation:**

* Home
* Regions
* Creatures
* Survival Systems
* Movement & Controls
* Quiz Center
* Saved Data

### **6B. Site Map**

```
Home
├── Regions
│   ├── Region Pages
│   │   ├── Subregions
│
├── Creatures
│   ├── Predators
│   ├── Prey
│
├── Survival Systems
│   ├── Food
│   ├── Hibernation
│   ├── Rain Cycle
│
├── Movement & Controls
├── Quiz Center
│   ├── Region Quiz
│   ├── Creature Quiz
│   ├── Survival Quiz
│
├── Survey Page
├── Saved Dashboard
```

### **6C. Full Site Content**

---

### **Home Page**

* **Text:** Introduction + purpose
* **Images:** Game banner, region preview
* **Interactions:** Navigation buttons
* **Animations:** Subtle rain background effect

---

### **Region Page Template**

* **Text:** Overview, hazards, traversal tips
* **Images:** Region map
* **Interactions:**

  * Clickable map areas
  * Creature links
  * Save Region button
* **Saved Data:** Saved regions

---

### **Creature Page**

* **Text:** Behavior, classification, threat level
* **Images:** Creature illustrations
* **Interactions:**

  * Hover tooltips
  * Save Creature button
* **Saved Data:** Saved creatures

---

### **Survival Systems Page**

* **Text:** Food, hibernation, rain cycle explanations
* **Images:** Diagrams
* **Interactions:** Interactive explanations
* **Animations:** Rain cycle demo

---

### **Quiz Pages**

**Format:**

* Multiple choice
* 5–10 questions
* Immediate feedback

**Features:**

* Score displayed
* Score saved to local storage

---

### **Survey Page**

* **Questions:**

  * Confidence level before/after
  * Ease of navigation
* **Purpose:** Measure effectiveness
* **Data:** Anonymous or optional saved

---

### **Saved Dashboard**

* Displays:

  * Saved regions
  * Saved creatures
  * Quiz scores
  * Notes

**Controls:**

* Delete/reset data
* View progress

## **8. Data Handling**

### **Stored in Local Storage**

* Saved regions
* Saved creatures
* Quiz scores
* Notes

### **Access**

* Through Dashboard page

### **Controls**

* Reset button
* Individual deletion

## **9. Design**

### **High-Fidelity Mockups (Descriptions)**

#### **Desktop Home**

* Hero banner
* Navigation bar
* Featured sections

#### **Region Page**

* Map on left
* Info panel on right

#### **Creature Page**

* Image top
* Info cards below

#### **Quiz Page**

* Centered questions
* Feedback display

#### **Dashboard**

* Card-based layout
* Progress indicators

#### **Mobile Versions**

* Stacked layout
* Collapsible menus

## **10. Style Guide**

### **Colors**

* Background: `#1E1E1E`
* Accent: `#4CAF50`
* Warning: `#E53935`
* Hover: `#66BB6A`

### **Typography**

* Heading: Serif (Georgia)
* Body: Sans-serif (Arial)
* Sizes:

  * H1: 32px
  * Body: 16px
* Line spacing: 1.5

---

### **UI Components**

**Buttons**

* Rounded corners
* Hover color change

**Cards**

* Shadow + padding

**Alerts**

* Red (danger), green (success)

**Quiz Feedback**

* Immediate highlight (green/red)

## **11. Requirements**

### **Essential**

* Responsive design
* Interactive quizzes
* Survey form
* Local storage
* Accessibility compliance

### **Desirable**

* Rain animation
* Hover tooltips
* Progress tracking
* Difficulty rating

## **12. Accessibility Considerations**

* WCAG-compliant contrast
* Keyboard navigation
* Alt text for all images
* Screen-reader labels
* No flashing content

## **13. Deployment Environment**

* Hosted on GitHub Pages
* Static site (HTML/CSS/JS)
* Uses JavaScript for local storage
* Compatible with modern browsers

## **14. Conclusion**

This website meets its goals by combining structured content with interactive elements that enhance learning. The design supports players without removing challenge, maintaining the core experience of *Rain World*. The balance between usability and discovery ensures players improve while still engaging with the game naturally.

## **15. Appendix**

### **Site Map Diagram**

(See section 6B)

### **Wireframes**

* Home layout
* Region layout
* Dashboard layout

### **Data Flow**

```
User Action → JS → Local Storage → Dashboard Display
```

### **Quiz Logic**

```
Answer Selected → Immediate Feedback → Score Update → Save Score
```

### **Local Storage Example**

```json
{
    "savedRegions": ["Industrial Complex"],
    "savedCreatures": ["Lizard"],
    "quizScores": {"regions": 80}
}
```